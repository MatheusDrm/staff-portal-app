<?php
session_start();
header("Content-Type: application/json");
include '../config/pdo_db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $username = filter_var($data["username"], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($data["email"], FILTER_SANITIZE_EMAIL);
    $password = filter_var($data["password"], FILTER_SANITIZE_SPECIAL_CHARS);
    $confirm_password = filter_var($data["confirm_password"], FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(["success" => false, "message" => "E-mail inválido!"]);
            exit();
        } elseif ($password !== $confirm_password) {
            echo json_encode(["success" => false, "message" => "As senhas não coincidem!"]);
            exit();
        } elseif (strlen($password) < 3) {
            echo json_encode(["success" => false, "message" => "A senha deve ter pelo menos 3 caracteres!"]);
            exit();
        }

        try {
            // Verifica se o usuário já existe
            $sql_check = "SELECT id FROM login_db WHERE usuario = :username OR email = :email";
            $stmt_check = $pdo_conn->prepare($sql_check);
            $stmt_check->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt_check->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt_check->execute();

            if ($stmt_check->rowCount() > 0) {
                echo json_encode(["success" => false, "message" => "Usuário ou e-mail já cadastrados!"]);
                exit();
            }

            // Hash seguro da senha e inserir no banco
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql_insert = "INSERT INTO login_db (usuario, email, senha) VALUES (:username, :email, :pass)";
            $stmt_insert = $pdo_conn->prepare($sql_insert);
            $stmt_insert->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt_insert->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt_insert->bindParam(':pass', $hashed_password, PDO::PARAM_STR);
            $stmt_insert->execute();

            echo json_encode(["success" => true, "message" => "Registro feito com sucesso!"]);
            exit();
        } catch (PDOException $e) {
            echo json_encode(["success" => false, "message" => "Erro ao registrar: " . $e->getMessage()]);
            exit();
        }
    } else {
        echo json_encode(["success" => false, "message" => "Preencha todos os campos!"]);
        exit();
    }
}
?>
