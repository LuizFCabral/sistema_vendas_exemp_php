<?php
include 'conecta.php';

// Verifica se o formulário foi submetido
if (isset($_POST["nome_produto"], $_POST["descricao_produto"], $_POST["preco_produto"], $_POST["codigo_barras"], $_POST["fornecedor_produto"], $_POST["qtd_estoque"])) {
    // Verifica se algum campo está vazio
    if (empty($_POST["nome_produto"]) || empty($_POST["descricao_produto"]) || empty($_POST["preco_produto"]) || empty($_POST["codigo_barras"]) || empty($_POST["fornecedor_produto"]) || empty($_POST["qtd_estoque"])) {
        echo "Todos os campos são obrigatórios. Por favor, preencha todos os campos.";
        // Redireciona de volta à página de cadastro após 3 segundos
        header("refresh:3; url=cadastro_produtos.php");
        exit();
    } else {
        // Todos os campos estão preenchidos, prosseguir com o cadastro
        $nome_produto = $_POST["nome_produto"];
        $descricao_produto = $_POST["descricao_produto"];
        $preco_produto = $_POST["preco_produto"];
        $codigo_barras = $_POST["codigo_barras"];
        $fornecedor_produto = $_POST["fornecedor_produto"];
        $qtd_estoque = $_POST["qtd_estoque"];

        $sql = "INSERT INTO produtos (nome_produto, descricao_produto, preco_produto, codigo_barras, fornecedor_produto, qtd_estoque) VALUES ('$nome_produto', '$descricao_produto', $preco_produto, '$codigo_barras', '$fornecedor_produto', $qtd_estoque)";
        
        if (mysqli_query($sistemas_vendas, $sql)) {
            
            echo "Produto cadastrado com sucesso!";
            // Redirecionamento após o cadastro bem-sucedido
            header("refresh:3; url=index.php");
            exit();
        } else {
            echo "Erro ao cadastrar produto: " . mysqli_error($sistemas_vendas);
        }
    }
    
    // Fecha a conexão com o banco de dados
    mysqli_close($sistemas_vendas);
} else {
    echo "Acesso não autorizado!";
}
?>
