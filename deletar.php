<?php
include "conexao.php"; // Inclui a conexão com o banco

// Pega o ID do usuário a partir da URL
$id = $_GET["id"];

// SQL para excluir o usuário
$sql = "DELETE FROM usuarios WHERE id = $id";

// Executa o comando
if ($conn->query($sql) === TRUE) {
    echo "Usuário excluído com sucesso! <a href='index.php'>Voltar para lista</a>";
} else {
    echo "Erro ao excluir usuário: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
