<?php

require_once 'conexao.php';

$id_hotel = $_GET['id_hotel'];

$sql = "SELECT reservas.id, clientes.nome AS nome_cliente, clientes.telefone,
        quartos.numero, reservas.data_entrada, reservas.data_saida
        FROM reservas
        JOIN quartos ON reservas.quarto_id = quartos.id
        JOIN clientes ON reservas.cliente_id = clientes.id
        WHERE quartos.hotel_id = '$id_hotel'";

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

    <title>Reservas do Hotel</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #780101;
        }

        .form {
            width: 700px;
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

    <h1 class="titulo_principal">🏨 Reservas do Hotel</h1>

    <div class="form">

        <h2 class="titulo_secundario">📅 Reservas Recebidas</h2>

        <table>

            <tr>

                <th>ID</th>

                <th>Cliente</th>

                <th>Telefone</th>

                <th>Quarto</th>

                <th>Entrada</th>

                <th>Saída</th>

            </tr>

            <?php

            while ($reserva = mysqli_fetch_assoc($resultado)) {

                echo "<tr>";

                echo "<td>" . $reserva['id'] . "</td>";

                echo "<td>" . $reserva['nome_cliente'] . "</td>";

                echo "<td>" . $reserva['telefone'] . "</td>";

                echo "<td>" . $reserva['numero'] . "</td>";

                echo "<td>" . date("d/m/Y", strtotime($reserva['data_entrada'])) . "</td>";

                echo "<td>" . date("d/m/Y", strtotime($reserva['data_saida'])) . "</td>";

                echo "</tr>";

            }

            ?>

        </table>

        <a class="botao" href="cadastrar_quarto.html">
            Cadastrar Novo Quarto
        </a>

        <a class="botao" href="logout_hotel.php">
            Sair
        </a>

    </div>

</body>

</html>