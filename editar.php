<?php
include "conexao.php";

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário atualizado com sucesso! <a href='index.php'>Voltar</a>";
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
    exit;
}

$sql = "SELECT * FROM usuarios WHERE id=$id";
$result = $conn->query($sql);
$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br><br>

        <input type="submit" value="Atualizar">
    </form>
    <br>
    <a href="index.php">Voltar para lista</a>
</body>
</html>
