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
        // Exibe uma mensagem de confirmação
        echo "<h2>Confirmação de Exclusão</h2>";
        echo "<p>Deseja realmente excluir este produto?</p>";
        echo "<p><strong>ID:</strong> " . $id_produto . "</p>";
        echo "<form action='processa_exclusao_produto.php' method='POST'>";
        echo "<input type='hidden' name='id_produto' value='" . $id_produto . "'>";
        echo "<input type='submit' name='confirmacao' value='Sim'>";
        echo "<input type='button' value='Não' onclick='window.history.back()'>";
        echo "</form>";
    } else {
        echo "Produto não encontrado.";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($sistemas_vendas);
} else {
    echo "ID do produto não especificado.";
}
?>