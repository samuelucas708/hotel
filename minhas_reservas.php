<?php
session_start();
require_once 'conexao.php';

if( !isset($_SESSION['logado'] || $_SESSION['logado'] !== true ){
    header("Location: login.html");
    exit();
} 

$sql = "SELECT reservas.*, clientes.nome, quartos.numero
        FROM reservas
        INNER JOIN clientes ON reservas.cliente_id = clientes.id
        INNER JOIN quartos ON reservas.quarto_id = quartos.id";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    echo "Erro ao consultar reservas: " . mysqli_error($conexao);
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Minhas Reservas</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #780101;
        }

        .form {
            width: 800px;
            margin: 30px auto;
            background-color: white;
            padding: 25px;
            border-radius: 15px;
            border: 2px solid rgb(139, 0, 0);
        }

        .titulo_principal {
            color: rgb(198, 0, 0);
            background-color: white;
            border: 3px solid rgb(6, 6, 174);
            margin: 30px auto;
            border-radius: 30px;
            width: 300px;
            padding: 10px;
        }

        .titulo_secundario {
            color: blue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
        }

        th {
            background-color: darkblue;
            color: white;
        }

        .botao {
            display: inline-block;
            margin-top: 20px;
            padding: 12px;
            background-color: darkblue;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .botao:hover {
            background-color: #2563EB;
        }

    </style>

</head>

<body>

    <h1 class="titulo_principal">🏨 Minhas Reservas</h1>

    <div class="form">

        <h2 class="titulo_secundario">📅 Reservas realizadas</h2>

        <table>

            <tr>
                <th>Cliente</th>
                <th>Quarto</th>
                <th>Data de Entrada</th>
                <th>Data de Saída</th>
                <th>Total</th>
            </tr>

            <?php

            while ($reserva = mysqli_fetch_assoc($resultado)) {

                $data_entrada = date("d/m/Y", $reserva['data_entrada']));

                $data_saida = date("d/m/Y", $reserva['data_saida']));

                echo "<tr>";

                echo "<td>" . $reserva['nome'] . "</td>";

                echo "<td>" . $reserva['numero'] . "</td>";

                echo "<td>" . $data_entrada . "</td>";

                echo "<td>" . $data_saida . "</td>";

                echo "<td>R$ " . $reserva['total'] . "</td>";

                echo "</tr>";
            }

            ?>

        </table>

        <a class="botao" href="listar_hoteis.php">
            Voltar para Hotéis
        </a>

    </div>

</body>

</html>