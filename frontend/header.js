import API_URL from "./config.js";

$(document).ready(function() {

    // Verificar se user está logado
    $.ajax({
        url: `${API_URL}/check_login.php`,
        type: "GET",
        dataType: "json",
        xhrFields: { withCredentials: true }, // Enviar cookies de sessão
        success: function(response) {
            if (!response.usuarioLogado) {
                window.location.href = "login.html"; 
            }
        }
    });


    // Carregar header via AJAX
    $.ajax({
        url: `${API_URL}/include/header.php`,
        type: "GET",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                $("#header-container").html(response.html);
            }
        }
    });

    // Animação de hover nos links
    $(document).on("mouseenter", "ul li a", function() {
        $(this).stop().animate({ fontSize: "18px", padding: "8px 12px", backgroundColor: "#ffffff", color: "#007bff" }, 300);
    }).on("mouseleave", "ul li a", function() {
        $(this).stop().animate({ fontSize: "16px", padding: "5px 10px", backgroundColor: "transparent", color: "white" }, 300);
    });
});

$(document).on("click", ".logout", function(event) {
    event.preventDefault(); // Impede o link de mudar de página
    $.ajax({
            url: `${API_URL}/logout.php`,
            type: "POST",
            dataType: "json",
            success: function(response) {
                console.log("Resposta do logout:", response); // Debug no console

                if (response.success) {
                    window.location.href = "login.html"; 
                }
            },
            error: function(xhr, status, error) {
                console.error("Erro ao tentar logout:", status, error);
            }
    });
});