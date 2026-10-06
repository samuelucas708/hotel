<?php

include 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM clientes WHERE email = '$email'";

$resultado = mysqli_query(
    $conexao,
    $sql
);

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        if (password_verify($senha, $linha['senha'])) {
            header("Location: minhas_reservas.php");
            exit();
        }
    }
} else {
    header("Location: login.html");
    exit();
}

?>
