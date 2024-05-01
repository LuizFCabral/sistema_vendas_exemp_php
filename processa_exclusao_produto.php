<?php
include 'conecta.php';

// Verifica se o ID do produto foi enviado via POST
if (isset($_POST['id_produto'])) {
    $id_produto = $_POST['id_produto'];

    // Remove o produto da tabela
    $sql = "DELETE FROM produtos WHERE id_produto = $id_produto";

    if (mysqli_query($sistemas_vendas, $sql)) {
        echo "Produto excluído com sucesso!";
        // Redirecionamento após a exclusão
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao excluir produto: " . mysqli_error($sistemas_vendas);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($sistemas_vendas);
} else {
    echo "ID do produto não especificado.";
}
?>
