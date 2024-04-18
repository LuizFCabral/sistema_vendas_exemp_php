<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Cadastro de Produtos</h2>
    <form action="processa_cadastro_produtos.php" method="POST" enctype="multipart/form-data">
        <label for="nome_produto">Nome do Produto:</label><br>
        <input type="text" id="nome_produto" name="nome_produto"><br><br>
        
        <label for="descricao_produto">Descrição do Produto:</label><br>
        <textarea id="descricao_produto" name="descricao_produto"></textarea><br><br>
        
        <label >Preço do Produto:</label><br>
        <input type="number" id="preco_produto" name="preco_produto" step="0.01"><br><br>
        
        <label >Código de Barras:</label><br>
        <input type="text" id="codigo_barras" name="codigo_barras"><br><br>
        
        <label >Fornecedor do Produto:</label><br>
        <input type="text" id="fornecedor_produto" name="fornecedor_produto"><br><br>
        
        <label >Quantidade em Estoque:</label><br>
        <input type="number" id="qtd_estoque" name="qtd_estoque" min="0"><br><br>
                
        <input type="submit" value="Cadastrar Produto">
    </form>
</body>
</html>