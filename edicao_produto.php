<!DOCTYPE html>
<html>
<head>
    <title>Edição de Produto</title>
</head>
<body>
    <h2>Edição de Produto</h2>
    <?php
 include 'conecta.php';
    // Verifica se o id do produto foi passado via URL
    if (isset($_GET['id_produto'])) {
        // Conexão com o banco de dados
       

        // Verifica se a conexão foi estabelecida com sucesso
        if ($sistemas_vendas === false) {
            die("Erro de conexão: " . mysqli_connect_error());
        }

        // Obtém o id do produto da URL
        $id_produto = $_GET['id_produto'];

        // Consulta o produto na tabela
        $sql = "SELECT * FROM produtos WHERE id_produto = $id_produto";
        $resultado = mysqli_query($sistemas_vendas, $sql);

        // Verifica se o produto foi encontrado
        if (mysqli_num_rows($resultado) == 1) {
            $linha = mysqli_fetch_assoc($resultado);
    ?>
            <form action="processa_edicao_produto.php" method="POST">
                <input type="hidden" name="id_produto" value="<?php echo $linha['id_produto']; ?>">
                <label for="nome_produto">Nome do Produto:</label><br>
                <input type="text" id="nome_produto" name="nome_produto" value="<?php echo $linha['nome_produto']; ?>"><br><br>
                
                <label for="descricao_produto">Descrição do Produto:</label><br>
                <textarea id="descricao_produto" name="descricao_produto"><?php echo $linha['descricao_produto']; ?></textarea><br><br>
                
                <label for="preco_produto">Preço do Produto:</label><br>
                <input type="number" id="preco_produto" name="preco_produto" step="0.01" value="<?php echo $linha['preco_produto']; ?>"><br><br>
                
                <label for="codigo_barras">Código de Barras:</label><br>
                <input type="text" id="codigo_barras" name="codigo_barras" value="<?php echo $linha['codigo_barras']; ?>"><br><br>
                
                <label for="fornecedor_produto">Fornecedor do Produto:</label><br>
                <input type="text" id="fornecedor_produto" name="fornecedor_produto" value="<?php echo $linha['fornecedor_produto']; ?>"><br><br>
                
                <label for="qtd_estoque">Quantidade em Estoque:</label><br>
                <input type="number" id="qtd_estoque" name="qtd_estoque" min="0" value="<?php echo $linha['qtd_estoque']; ?>"><br><br>
                
                <input type="submit" value="Salvar Alterações">
            </form>
    <?php
        } else {
            echo "Produto não encontrado.";
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($sistemas_vendas);
    } else {
        echo "ID do produto não especificado.";
    }
    ?>
</body>
</html>