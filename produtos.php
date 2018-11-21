<?php
include_once 'dao/clsProdutoDAO.php';
include_once 'dao/clsConexao.php';
include_once 'model/clsCategoria.php';
include_once 'model/clsProduto.php';
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Market M171 - Produtos</title>
    </head>
    <body>


        <?php
        require_once 'menu.php';
        ?>

        <h1 align="center">Produtos</h1>
        <br><br><br>

        <!--botão para adicionar clientes -->
        <a href="frmProduto.php">
            <button>Cadastrar novo Produto</button></a>
        <br><br>

        
       
        <?php
        $lista = ProdutoDAO::getProdutos();

        if ($lista->count() == 0) {
            echo '<h3> Nenhum produto cadastrado! </h3>';
        } else {
            ?>


        
        <!-- montar uma tabela -->
        <table border="3">
            <!-- cabeçalho da tabela -->
            <tr> 
                <!-- para fazer uma célula de uma coluna -->
                <th>Código</th>
                <th>Foto</th>
                <th>Nome do Produto</th>
                <th>preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
          

                <?php
                foreach ($lista as $pro) {
                    echo '<tr>';
                    echo '  <td>' . $pro->getId() . '</td>';
                    echo '  <td><img src="fotos_produtos/' . $pro->getFoto() . '" width="30px"/></td>';
                    echo '  <td>' . $pro->getNome() . '</td>';
                    echo '  <td>' . $pro->getPreco() . '</td>';
                    echo '  <td>' . $pro->getQuantidade() . '</td>';
                    echo '  <td>' . $pro->getCategoria()->getNome() . '</td>';

                    echo '  <td><a href="frmProduto.php?editar&idProduto='.$pro->getId().'" ><button>Editar</button></a></td>';
                    echo '  <td><a href="controller/salvarProduto.php?excluir&idProduto='.$pro->getId().'" ><button>Excluir</button></a></td>';
                    echo '</tr>';
             
                }
                ?>


            </table>
  <?php
        }
        ?>
    </body>
</html>
