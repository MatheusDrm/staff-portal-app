echo "<?php echo 'Servidor PHP rodando corretamente!'; ?>"

<?php
session_start();
$_SESSION['teste'] = $_SESSION['teste'] ?? 0;
$_SESSION['teste']++;

echo json_encode([
    "session_id" => session_id(),
    "teste" => $_SESSION['teste']
]);
?>
