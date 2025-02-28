const API_URL = "http://localhost:8000"; // Mude isso no Docker


$(document).ready(function() {
    $("#registerForm").submit(function(event) {
        event.preventDefault();

        let formData = {
            username: $("#username").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            confirm_password: $("#confirm_password").val()
        };

        $.ajax({
            url: `${API_URL}/register.php`,
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(formData),
            success: function(response) {
                if (response.success) {
                    showMessage(response.message, "sucesso");
                    setTimeout(() => {
                        window.location.href = "login.html";
                    }, 2000);
                } else {
                    showMessage(response.message, "erro");
                }
            }
        });
    });


    function showMessage(text, type) {
        let messageElement = $("#mensagem");
        messageElement.removeClass("sucesso erro").addClass(type);
        messageElement.text(text).fadeIn();

        setTimeout(() => {
            messageElement.fadeOut();
        }, 2000);
    }


});