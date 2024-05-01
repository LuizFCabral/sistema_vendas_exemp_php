<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Exclusão</title>
</head>
<body>
    <h2>Confirmação de Exclusão</h2>
    <?php if (isset($_GET['id_produto'])): ?>
        <?php $id_produto = $_GET['id_produto']; ?>
        <p>Deseja realmente excluir o produto com ID: <?= $id_produto ?>?</p>
        <form action="processa_exclusao_produto.php" method="POST">
            <input type="hidden" name="id_produto" value="<?= $id_produto ?>">
            <input type="submit" name="confirmacao" value="Sim">
            <a href="index.php">Não</a>
        </form>
    <?php else: ?>
        <p>ID do produto não especificado.</p>
    <?php endif; ?>
</body>
</html>
