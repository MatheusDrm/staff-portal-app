<?php
session_start();
header("Content-Type: application/json");
include '../config/pdo_db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    
    $username = filter_var($data["username"], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($data["password"], FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($username) && !empty($password)) {
        try {
            $sql = "SELECT id, usuario, senha FROM login_db WHERE usuario = :username LIMIT 1";
            $stmt = $pdo_conn->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user){
                if(password_verify($password, $user['senha'])) {
                    $_SESSION['usuario'] = $user['usuario'];
                    $_SESSION['id'] = $user['id'];
                    echo json_encode(["success" => true, "message" => "Login realizado com sucesso!"]);
                    exit();
                } else {
                    echo json_encode(["success" => false, "message" => "Usuário ou senha incorretos!"]);
                    exit();
                }
            }else{
                echo json_encode(["success" => false, "message" => "Usuário não registrado!"]);
            }

        } catch (PDOException $e) {
            echo json_encode(["success" => false, "message" => "Erro no banco de dados: " . $e->getMessage()]);
            exit();
        }
    } else {
        echo json_encode(["success" => false, "message" => "Preencha todos os campos!"]);
        exit();
    }
}
?>
