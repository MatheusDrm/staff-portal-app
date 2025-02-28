$(document).ready(function() {
    $("#loginForm").submit(function(event) {
        event.preventDefault();

        let formData = {
            username: $("#username").val(),
            password: $("#password").val()
        };

        $.ajax({
            url: "../backend/login.php",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(formData),
            success: function(response) {
                if (response.success) {
                    showMessage(response.message, "sucesso");
                    setTimeout(() => {
                        window.location.href = "home.html";
                    }, 300);
                }else{
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
        }, 300);
    }

});