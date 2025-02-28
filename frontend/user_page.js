$(document).ready(function() {

    $(".header").load("header.html")

    // Buscar informações do usuário via AJAX

    function verify_worker_registration(){
        $.ajax({
            url: "../backend/check_worker_registration.php",
            type: "POST",
            contentType: "application/json",
            success: function(response) {
                // Caso o usuario já esteja registrado
                if (response.success && response.data) {
                    $("#info-usuario").show();
                    $(".user-info").html(`
                        <p><strong>Nome:</strong> ${response.data.usuario}</p>
                        <p><strong>Cargo:</strong> ${response.data.cargo}</p>
                        <p><strong>Tecnologia:</strong> ${response.data.tecnologia}</p>
                        <p><strong>Local de Trabalho:</strong> ${response.data.localTrabalho}</p>
                    `);
                } else {
                    // Se não cadastrado, exibe formulário
                    $("#formulario-cadastro").show();
                }
            }
        });
    } 

    verify_worker_registration();

    // Enviar cadastro via AJAX
    $("#funcionarioForm").submit(function(event) {
        event.preventDefault();

        let formData = {
            cargo: $("#cargo").val(),
            tecnologia: $("#tecnologia").val(),
            siteLocation: $("#siteLocation").val()
        };

        $.ajax({
            url: "../backend/worker_registration.php",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(formData),
            success: function(response) {
                if (response.success) {
                    showMessage(response.message, "sucesso");
                    $("#funcionarioForm")[0].reset();
                    $("#formulario-cadastro").hide();
                    verify_worker_registration();
                } else {
                    showMessage(response.error, "erro");
                }
            }
        });
    });

    // Função para exibir mensagens
    function showMessage(text, type) {
        let messageElement = $("#mensagem");
        messageElement.removeClass("sucesso erro").addClass(type);
        messageElement.text(text).fadeIn();

        // Esconder mensagem após 5 segundos
        setTimeout(() => {
            messageElement.fadeOut();
        }, 3000);
    }
});