<?php
session_start();
header("Content-Type: application/json");

// Verifica se o usuário está logado
$usuarioLogado = isset($_SESSION['usuario']) ? true : false;

// HTML do header gerado dinamicamente
$headerHtml = '
<header>
    <nav>
        <h2>Matriz de Ensaios</h2>
        <ul>
            <li><a href="../frontend/home.html">Home</a></li>
            <li><a href="../frontend/user_page.html">User Profile</a></li>';
if ($usuarioLogado) {
    $headerHtml .= '<li><button class="logout">Logout</a></li>';
}
$headerHtml .= '
        </ul>
    </nav>
</header>';

echo json_encode(["success" => true, "html" => $headerHtml]);
exit();
?>
