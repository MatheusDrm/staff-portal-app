<?php

    include __DIR__ . '/config/pdo_db.php';

    // Garante que a sessão existe
    if (!isset($_SESSION['usuario'])) {
        echo json_encode(["error" => "Usuário não autenticado"]);
        exit();
    }

    // Lê os dados enviados via POST
    $data = json_decode(file_get_contents("php://input"), true);

    // Verifica se os campos foram preenchidos
    if (empty($data['cargo']) || empty($data['tecnologia']) || empty($data['siteLocation'])) {
        echo json_encode(["error" => "Todos os campos são obrigatórios"]);
        exit();
    }

    $username = $_SESSION['usuario'];
    $user_id = $_SESSION['user_id'];

    try {
        $sql_insert = "INSERT INTO funcionarios_db (user_id, usuario, cargo, tecnologia, localTrabalho) 
                    VALUES (:id_user, :username, :cargo, :tecnologia, :localTrabalho)";
        $stmt = $pdo_conn->prepare($sql_insert);
        $stmt->bindParam(':id_user', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':cargo', $data['cargo'], PDO::PARAM_STR);
        $stmt->bindParam(':tecnologia', $data['tecnologia'], PDO::PARAM_STR);
        $stmt->bindParam(':localTrabalho', $data['siteLocation'], PDO::PARAM_STR);
        $exec = $stmt->execute();

        if ($exec) {
            echo json_encode(["success" => true, "message" => "Cadastro realizado com sucesso!"]);
        } else {
            echo json_encode(["error" => "Erro ao cadastrar no banco de dados"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["error" => "Erro ao inserir dados: " . $e->getMessage()]);
    }
?>
