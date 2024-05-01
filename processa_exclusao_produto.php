<?php
include 'conecta.php';

// Verifica se o ID do produto foi enviado via POST
if (isset($_POST['id_produto'])) {
    $id_produto = $_POST['id_produto'];

    // Consulta para verificar se o produto existe no banco de dados
    $consulta_produto = "SELECT * FROM produtos WHERE id_produto = $id_produto";
    $resultado_consulta = mysqli_query($sistemas_vendas, $consulta_produto);

    if (mysqli_num_rows($resultado_consulta) > 0) {
        // Produto encontrado, prosseguir com a exclusão
        $sql = "DELETE FROM produtos WHERE id_produto = $id_produto";

        if (mysqli_query($sistemas_vendas, $sql)) {
            echo "Produto excluído com sucesso!";
            // Redirecionamento após a exclusão
            header("refresh:3; url=index.php");
            exit();
        } else {
            echo "Erro ao excluir produto: " . mysqli_error($sistemas_vendas);
        }
    } else {
        // Produto não encontrado, informar ao usuário e redirecionar para a página de listagem
        echo "Produto não encontrado.";
        header("refresh:3; url=index.php");
        exit();
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($sistemas_vendas);
} else {
    echo "ID do produto não especificado.";
}
?>
