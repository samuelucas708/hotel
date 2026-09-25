<?php

require_once 'conexao.php';

$id_cliente = $_POST['id_cliente'];
$id_quarto = $_POST['id_quarto'];
$data_entrada = $_POST['data_entrada'];
$data_saida = $_POST['data_saida'];



$sql_cliente = "SELECT id FROM clientes WHERE id = '$id_cliente'";

$resultado_cliente = mysqli_query($conexao, $sql_cliente);

if (!$resultado_cliente) {
    echo "Erro ao consultar cliente.";
    exit;
}

if (mysqli_num_rows($resultado_cliente) == 0) {
    echo "Cliente não encontrado! Digite um ID de cliente cadastrado.";
    exit;
}



$sql_quarto = "SELECT id, preco_diaria FROM quartos WHERE id = '$id_quarto'";

$resultado_quarto = mysqli_query($conexao, $sql_quarto);

if (!$resultado_quarto) {
    echo "Erro ao consultar quarto.";
    exit;
}

if (mysqli_num_rows($resultado_quarto) == 0) {
    echo "Quarto não encontrado! Digite um ID de quarto cadastrado.";
    exit;
}

$quarto = mysqli_fetch_assoc($resultado_quarto);

$preco_diaria = $quarto['preco_diaria'];



$entrada = new DateTime($data_entrada);
$saida = new DateTime($data_saida);

$diferenca = $entrada->diff($saida);

$dias = $diferenca->days;

if ($dias <= 0) {
    echo "A data de saída deve ser depois da data de entrada.";
    exit;
}



$total = $dias * $preco_diaria;



$sql = "INSERT INTO reservas 
(cliente_id, quarto_id, data_entrada, data_saida, total)
VALUES 
('$id_cliente', '$id_quarto', '$data_entrada', '$data_saida', '$total')";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Reserva realizada</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #780101;
        }

        .form {
            width: 500px;
            margin: 50px auto;
            background-color: white;
            padding: 25px;
            border-radius: 15px;
            border: 2px solid rgb(139, 0, 0);
        }

        .titulo {
            color: rgb(198, 0, 0);
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

    </style>

</head>

<body>

    <div class="form">

        <h1 class="titulo">✅ Reserva realizada!</h1>

        <p>ID do Cliente: <?php echo $id_cliente; ?></p>
        <p>ID do Quarto: <?php echo $id_quarto; ?></p>
        <p>Data de Entrada: <?php echo $data_entrada; ?></p>
        <p>Data de Saída: <?php echo $data_saida; ?></p>
        <p>Quantidade de dias: <?php echo $dias; ?></p>
        <p>Preço da diária: R$ <?php echo $preco_diaria; ?></p>
        <p>Total: R$ <?php echo $total; ?></p>

        <a class="botao" href="listar_reservas.php">
            Ver Minhas Reservas
        </a>

    </div>

</body>

</html>

<?php

} else {

    echo "Erro ao salvar reserva.";

}

?>