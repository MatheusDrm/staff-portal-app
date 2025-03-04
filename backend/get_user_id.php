<?php

    include '../config/pdo_db.php'; // Ajuste o caminho conforme necessário

    // Verifica se o usuário está logado antes de buscar o ID
    if (!isset($_SESSION['usuario'])) {
        echo json_encode(["success" => false, "error" => "Usuário não autenticado"]);
        exit();
    }

    try {
        // Consulta para buscar o ID do usuário baseado no nome de usuário
        $sql_check = "SELECT id FROM login_db WHERE usuario = :username";
        $stmt_check = $pdo_conn->prepare($sql_check);
        $stmt_check->bindParam(':username', $_SESSION['usuario']);
        $stmt_check->execute();

        $user = $stmt_check->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user_id'] = $user['id']; // Armazena o ID na sessão
            echo json_encode(["success" => true, "user_id" => $user['id'], "username" => $_SESSION['usuario']]);
        } else {
            echo json_encode(["success" => false, "error" => "Usuário não encontrado"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "error" => "Erro ao consultar banco de dados: " . $e->getMessage()]);
    }
    exit();
?>
