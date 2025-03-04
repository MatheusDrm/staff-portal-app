<?php
    session_start();
    header("Content-Type: application/json");

    header("Access-Control-Allow-Origin: http://localhost:8080"); // Permite chamadas do frontend
    header("Access-Control-Allow-Credentials: true"); // Permite envio de cookies (sessão)
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    
    include __DIR__ . '/config/pdo_db.php';

    // Garante que o usuário está autenticado
    if (!isset($_SESSION['usuario'])) {
        echo json_encode(["error" => "Usuário não autenticado"]);
        exit();
    }

    // Verifica se o campo user_id foi enviado
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["success" => false, "error" => "ID do usuário não fornecido"]);
        exit();
    }

    $user_id = $_SESSION['user_id'];
    
    try {
        $sql = "SELECT usuario, cargo, tecnologia, localTrabalho FROM funcionarios_db WHERE user_id = :user_id";
        $stmt = $pdo_conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        // Criar um único JSON de resposta
        $response = [
            "success" => true,
            "message" => $user_data ? "Usuário encontrado." : "Usuário não cadastrado.",
            "data" => $user_data ? $user_data : null
        ];

    } catch (PDOException $e) {
        $response = [
            "success" => false,
            "error" => "Erro no banco de dados: " . $e->getMessage()
        ];
    }

    // Retorna uma única resposta JSON
    echo json_encode($response);
    exit();
?>
