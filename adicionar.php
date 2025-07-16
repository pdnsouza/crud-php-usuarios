<?php include "conexao.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>

    <form action="adicionar.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <br>
    <a href="index.php">Ver lista de usuários</a>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];

        $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Usuário cadastrado com sucesso!</p>";
        } else {
            echo "<p>Erro: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>
</body>
</html>
