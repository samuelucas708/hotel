<?php

include 'conexao.php';

$id_hotel = $_POST['id_hotel'];
$numero_quarto = $_POST['numero_quarto'];
$tipo_quarto = $_POST['tipo_quarto'];
$preco_diaria = $_POST['preco_diaria'];


$sql = "INSERT INTO quartos (hotel_id, numero, tipo, preco_diaria)
        VALUES ('$id_hotel', '$numero_quarto', '$tipo_quarto', '$preco_diaria')";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {

    echo "Erro ao cadastrar: " . mysqli_error($conexao);

    exit;
}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel - Resultado</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #780101;
        }

        .form {
            width: 400px;
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

        .voltar {
            display: inline-block;
            width: 330px;
            margin-top: 20px;
            border-radius: 8px;
            padding: 12px;
            background-color: darkblue;
            color: white;
            text-decoration: none;
        }

        .voltar:hover {
            background-color: #2563EB;
        }

    </style>

</head>

<body>

    <h1 class="titulo_principal">

        🏨 Hotel - Cadastro

    </h1>

    <div class="form">

        <h2 class="titulo_secundario">

            ✅ Quarto cadastrado!

        </h2>

        <p>

            🏨 ID do Hotel:
            <?php echo $id_hotel; ?>

        </p>

        <p>

            🚪 Número do Quarto:
            <?php echo $numero_quarto; ?>

        </p>

        <p>

            🛏️ Tipo de Quarto:
            <?php echo $tipo_quarto; ?>

        </p>

        <p>

            💰 Preço da Diária:
            R$ <?php echo $preco_diaria; ?>

        </p>

        <a class="voltar" href="cadastrar_quarto.html">

            VOLTAR

        </a>

        <br>

        <a class="voltar" href="logout_hotel.php">

            SAIR DO SISTEMA

        </a>

    </div>

</body>

</html>
