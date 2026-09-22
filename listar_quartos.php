<?php

require_once 'conexao.php';

$sql = "SELECT * FROM quartos";

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

        .voltar {
            display: inline-block;
            width: 300px;
            margin-top: 20px;
            border-radius: 8px;
            padding: 12px;
            background-color: darkblue;
            color: white;
            text-decoration: none;
        }

    </style>

</head>

<body>

    <h1 class="titulo_principal">

        🏨 Hotel - Quartos

    </h1>

    <div class="form">

        <h2 class="titulo_secundario">

            🛏️ Quartos cadastrados

        </h2>

        <table>

            <tr>

                <th>ID Hotel</th>
                <th>Número</th>
                <th>Tipo</th>
                <th>Preço da Diária</th>

            </tr>

            <?php

            while ($quarto = mysqli_fetch_assoc($resultado)) {

                echo "<tr>";

                echo "<td>" . $quarto['hotel_id'] . "</td>";
                echo "<td>" . $quarto['numero'] . "</td>";
                echo "<td>" . $quarto['tipo'] . "</td>";
                echo "<td>R$ " . $quarto['preco_diaria'] . "</td>";

                echo "</tr>";

            }

            ?>

        </table>

        <a class="voltar" href="cadastrar_quarto.html">

            CADASTRAR NOVO QUARTO

        </a>

        <br>

        <a class="voltar" href="logout_hotel.php">

            SAIR DO SISTEMA

        </a>

    </div>

</body>

</html>