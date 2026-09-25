<?php

require_once 'conexao.php';

$id_cliente = $_GET['id_cliente'];

$sql = "SELECT reservas.id, quartos.numero, quartos.tipo, quartos.preco_diaria,
        reservas.data_entrada, reservas.data_saida FROM reservas
        JOIN quartos ON reservas.quarto_id = quartos.id

        WHERE reservas.cliente_id = '$id_cliente'";

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
    <title>Minhas Reservas</title>
</head>
<body>
    <h1>Minhas Reservas</h1>
    <table>

        <tr>
            <th>ID</th>
            <th>Número do Quarto</th>
            <th>Tipo</th>
            <th>Preço</th>
            <th>Data de Entrada</th>
            <th>Data de Saída</th>
        </tr>

        <?php

        while ($reserva = mysqli_fetch_assoc($resultado)) {

            echo "<tr>";

            echo "<td>" . $reserva['id'] . "</td>";
            echo "<td>" . $reserva['numero'] . "</td>";
            echo "<td>" . $reserva['tipo'] . "</td>";
            echo "<td>R$ " . $reserva['preco_diaria'] . "</td>";
            echo "<td>" . date("d/m/Y", strtotime($reserva['data_entrada'])) . "</td>";
            echo "<td>" . date("d/m/Y", strtotime($reserva['data_saida'])) . "</td>";

            echo "</tr>";
        }

        ?>

    </table>

    <br>

    <a href="listar_hoteis.php">Voltar para lista de hotéis</a>

</body>

</html>