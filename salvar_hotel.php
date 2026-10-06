<?php

include 'conexao.php';

$nome = $_POST['nome'];
$cidade = $_POST['cidade'];
$estrelas = $_POST['estrelas'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "INSERT INTO hoteis (nome, cidade, estrelas, email, senha)
        VALUES ('$nome', '$cidade', '$estrelas', '$email', '$senha')";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
    exit;
}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

```
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

</style>
```

</head>

<body>


<h1 class="titulo_principal">

    🏨 Hotel - Cadastro

</h1>

<div class="form">

    <h2 class="titulo_secundario">

        ✅ Hotel cadastrado!

    </h2>

    <p>
        🏨 Nome do Hotel: <?php echo $nome; ?>
    </p>

    <p>
        📍 Cidade: <?php echo $cidade; ?>
    </p>

    <p>
        ⭐ Estrelas: <?php echo $estrelas; ?>
    </p>
    
    <p>
        Email: <?php echo $email; ?>
    </p>

    <p>
         Senha: <?php echo "🔒🔒🔒"; ?>
    
</p>


   

    <a class="voltar" href="cadastro_hotel.html">

        VOLTAR

    </a>

</div>
```

</body>

</html>
