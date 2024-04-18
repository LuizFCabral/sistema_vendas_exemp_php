<?php
include 'conecta.php';

$nome_produto = $_POST["nome_produto"];
    $descricao_produto = $_POST["descricao_produto"];
    $preco_produto = $_POST["preco_produto"];
    $codigo_barras = $_POST["codigo_barras"];
    $fornecedor_produto = $_POST["fornecedor_produto"];
    $qtd_estoque = $_POST["qtd_estoque"];


    $sql = "INSERT INTO produtos (nome_produto, descricao_produto, preco_produto, codigo_barras, fornecedor_produto, qtd_estoque) VALUES ('$nome_produto', '$descricao_produto', $preco_produto, '$codigo_barras', '$fornecedor_produto', $qtd_estoque)";
    
    if (mysqli_query($conexao, $sql)) {
        // Salva as fotos do produto na pasta "fotos_produtos"
        $target_dir = "fotos_produtos/";
        foreach ($_FILES["fotos_produto"]["tmp_name"] as $key => $tmp_name) {
            $target_file = $target_dir . basename($_FILES["fotos_produto"]["name"][$key]);
            move_uploaded_file($tmp_name, $target_file);
        }
        
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar produto: " . mysqli_error($conexao);
    }
    
    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
?>