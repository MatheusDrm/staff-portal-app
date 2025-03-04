import API_URL from "./config.js";

$(document).ready(function() {
    $("#loginForm").submit(function(event) {
        event.preventDefault();

        let formData = {
            username: $("#username").val(),
            password: $("#password").val()
        };

        $.ajax({
            url: `${API_URL}/login.php`,
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(formData),
            xhrFields: { withCredentials: true }, // 🔥 Permite envio de cookies/sessão
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