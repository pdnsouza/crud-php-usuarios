<?php include "conexao.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
</head>
<body>
    <h2>Lista de Usuários Cadastrados</h2>
    <a href="adicionar.php">+ Adicionar novo usuário</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Cadastro</th>
            <th>Ações</th> <!-- Coluna de ações (Editar, Excluir) -->
        </tr>

        <?php
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha["id"] . "</td>";
                echo "<td>" . $linha["nome"] . "</td>";
                echo "<td>" . $linha["email"] . "</td>";
                echo "<td>" . $linha["data_cadastro"] . "</td>";
                echo "<td><a href='editar.php?id=" . $linha["id"] . "'>Editar</a> | <a href='deletar.php?id=" . $linha["id"] . "'>Excluir</a></td>"; // Link para Editar e Excluir
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum usuário cadastrado.</td></tr>"; // Corrigido para 5 colunas
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
