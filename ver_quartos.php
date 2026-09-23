<?php
require_once 'conexao.php';
$id_hotel = $_GET['id_hotel'];
$sql = "SELECT * FROM quartos WHERE hotel_id = '$id_hotel'";
$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
    echo "Erro ao consultar quartos: " . mysqli_error($conexao);
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel - Quartos</title>

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

        input {
            padding: 8px;
            margin: 5px;
        }

        .botao {
            margin-top: 15px;
            border-radius: 8px;
            padding: 12px;
            background-color: darkblue;
            color: white;
            border: none;
        }

    </style>

</head>

<body>

    <h1 class="titulo_principal">🏨 Quartos Disponíveis</h1>

    <div class="form">

        <h2 class="titulo_secundario">🛏️ Quartos do Hotel</h2>

        <table>

            <tr>
                <th>Número</th>
                <th>Tipo</th>
                <th>Preço</th>
            </tr>

            <?php

            while ($quarto = mysqli_fetch_assoc($resultado)) {

                echo "<tr>";
                echo "<td>" . $quarto['numero'] . "</td>";
                echo "<td>" . $quarto['tipo'] . "</td>";
                echo "<td>R$ " . $quarto['preco_diaria'] . "</td>";
                echo "</tr>";
            }

            ?>

        </table>

        <h2 class="titulo_secundario"> Fazer Reserva</h2>

        <form action="salvar_reserva.php" method="POST">

            <p>id do Cliente: <input type="number" name="id_cliente" required></p>
            <p>ID do Quarto:<input type="number" name="id_quarto" required></p>
            <p> Data de Entrada:<input type="date" name="data_entrada" required></p>
            <p>Data de Saída:<input type="date" name="data_saida" required></p>
            <input class="botao" type="submit" value="Confirmar Reserva">

        </form>

    </div>

</body>

</html>