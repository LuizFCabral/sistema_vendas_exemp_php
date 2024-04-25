<?php
include 'conecta.php';

// Verifica se o id do produto foi enviado via POST
if (isset($_POST['id_produto'])) {
    // Conexão com o banco de dados


    // Verifica se a conexão foi estabelecida com sucesso
    if ($sistemas_vendas === false) {
        die("Erro de conexão: " . mysqli_connect_error());
    }

    // Obtém o id do produto enviado via POST
    $id_produto = $_POST['id_produto'];

    // Remove o produto da tabela
    $sql = "DELETE FROM produtos WHERE id_produto = $id_produto";
    if (mysqli_query($sistemas_vendas, $sql)) {
        echo "Produto excluído com sucesso!";
    } else {
        echo "Erro ao excluir produto: " . mysqli_error($sistemas_vendas);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($sistemas_vendas);
} else {
    echo "ID do produto não especificado.";
}
?>