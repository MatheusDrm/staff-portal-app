import API_URL from "./config.js";

$(document).ready(function() {
    $.ajax({
        url: `${API_URL}/check_login.php`,
        type: "GET",
        dataType: "json",
        xhrFields: { withCredentials: true }, // Enviar cookies de sessão
        success: function(response) {
            if (response.usuarioLogado) {
                window.location.href = "home.html"; // Redireciona se estiver logado
            } else {
                window.location.href = "login.html"; // Redireciona para login se não estiver logado
            }
        },
        error: function() {
            window.location.href = "login.html"; // Em caso de erro, redireciona para login
        }
    });
});