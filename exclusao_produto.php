<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Exclusão</title>
</head>
<body>
    <h2>Confirmação de Exclusão</h2>
    <?php
    // Verifica se o ID do produto foi passado via URL
    if (isset($_GET['id_produto'])) {
        $id_produto = $_GET['id_produto'];
        echo "<p>Deseja realmente excluir o produto com ID: $id_produto?</p>";
        echo "<form action='http://localhost:8080/processa_exclusao_produto.php' method='POST'>";
        echo "<input type='hidden' name='id_produto' value='$id_produto'>";
        echo "<input type='submit' name='confirmacao' value='Sim'>";
        echo "<a href='index.php'>Não</a>";
        echo "</form>";
    } else {
        echo "<p>ID do produto não especificado.</p>";
    }
    ?>
</body>
</html>
