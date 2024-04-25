<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Produtos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Listagem de Produtos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade em Estoque</th>
            <th>Ações</th>
        </tr>
        <?php
        include 'conecta.php';
        // Conexão com o banco de dados


        // Verifica se a conexão foi estabelecida com sucesso
        if ($sistemas_vendas === false) {
            die("Erro de conexão: " . mysqli_connect_error());
        }

        // Consulta os produtos na tabela
        $sql = "SELECT * FROM produtos";
        $resultado = mysqli_query($sistemas_vendas, $sql);

        // Exibe os dados dos produtos em uma tabela HTML
        if (mysqli_num_rows($resultado) > 0) {
            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $linha['id_produto'] . "</td>";
                echo "<td>" . $linha['nome_produto'] . "</td>";
                echo "<td>" . $linha['descricao_produto'] . "</td>";
                echo "<td>R$ " . number_format($linha['preco_produto'], 2, ',', '.') . "</td>";
                echo "<td>" . $linha['qtd_estoque'] . "</td>";
                echo "<td><a href='edicao_produto.php?id_produto=" . $linha['id_produto'] . "'>Editar</a> | <a href='exclusao_produto.php?id_produto=" . $linha['id_produto'] . "'>Excluir</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum produto cadastrado.</td></tr>";
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($sistemas_vendas);
        ?>
    </table>
</body>
</html>