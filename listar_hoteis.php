<?php

require_once 'conexao.php';

$sql = "SELECT * FROM hoteis";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    echo "Erro ao consultar hotéis: " . mysqli_error($conexao);
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel - Hotéis</title>

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
            padding: 10px;
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

    <h1 class="titulo_principal">🏨 Hotéis Disponíveis</h1>

    <div class="form">

        <h2 class="titulo_secundario">🏨 Hotéis Parceiros</h2>

        <table>

            <tr>
                <th>Nome do Hotel</th>
                <th>Cidade</th>
                <th>Estrelas</th>
                <th>Quartos</th>
            </tr>

            <?php

            while ($hotel = mysqli_fetch_assoc($resultado)) {

                echo "<tr>"; echo "<td>" . $hotel['nome'] . "</td>";echo "<td>" . $hotel['cidade'] . "</td>"; echo "<td>⭐ " . $hotel['estrelas'] . "</td>";
                echo "<td>";
                echo "<a class='botao' href='ver_quartos.php?id_hotel=" . $hotel['id'] . "'>";
                echo "Ver Quartos Disponíveis";
                echo "</a>";
                echo "</td>";
                echo "</tr>";
            }

            ?>

        </table>

    </div>

</body>

</html>