import API_URL from "./config.js";

$(document).ready(function() {

    $(".header").load("header.html")

    $.ajax({
        url: `${API_URL}/check_login.php`,
        type: "GET",
        dataType: "json",
        xhrFields: { withCredentials: true }, // Enviar cookies de sessão
        success: function(response) {
            if (!response.usuarioLogado) {
                window.location.href = "login.html"; // Redireciona se não estiver logado
            } else {
                // Buscar ID do usuário
                $.ajax({
                    url: `${API_URL}/get_user_id.php`,
                    type: "GET",
                    dataType: "json",
                    success: function(userResponse) {
                        if (userResponse.success) {
                            $("#welcome-message").text("Bem-vindo à Home " + userResponse.username + "!");
                        } else {
                            console.error(userResponse.error);
                        }
                    }
                });
            }
        }
    });
});