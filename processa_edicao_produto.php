<?php
include 'conecta.php';
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $id_produto = $_POST["id_produto"];
    $nome_produto = $_POST["nome_produto"];
    $descricao_produto = $_POST["descricao_produto"];
    $preco_produto = $_POST["preco_produto"];
    $codigo_barras = $_POST["codigo_barras"];
    $fornecedor_produto = $_POST["fornecedor_produto"];
    $qtd_estoque = $_POST["qtd_estoque"];
    
    
    // Atualiza os dados na tabela de produtos
    $sql = "UPDATE produtos SET 
            nome_produto = '$nome_produto', 
            descricao_produto = '$descricao_produto', 
            preco_produto = $preco_produto, 
            codigo_barras = '$codigo_barras', 
            fornecedor_produto = '$fornecedor_produto', 
            qtd_estoque = $qtd_estoque 
            WHERE id_produto = $id_produto";
    
    if (mysqli_query($sistemas_vendas, $sql)) {
        echo "Produto atualizado com sucesso!";
        // Redirecionamento após a edição
        header("Location: listagem_produtos.php");
        exit();
    } else {
        echo "Erro ao atualizar produto: " . mysqli_error($sistemas_vendas);
    }
    
    // Fecha a conexão com o banco de dados
    mysqli_close($sistemas_vendas);
} else {
    echo "Acesso não autorizado!";
}
?>
