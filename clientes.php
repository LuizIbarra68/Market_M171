
<?php

session_start();
if( isset( $_SESSION['admin']) && $_SESSION['admin'] ){
  
include_once 'model/clsCidade.php';
include_once 'model/clsCliente.php';
include_once 'dao/clsConexao.php';
include_once 'dao/clsClienteDAO.php';
?>


<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Market M171 - Clientes</title>
    </head>
    <body>


        <?php
        require_once 'menu.php';
        ?>

        <h1 align="center">Clientes</h1>
        <br><br><br>

        <!--botão para adicionar clientes -->
        <a href="frmCliente.php">
            <button>Cadastrar novo Cliente</button></a>
        <br><br>
        <?php
        $lista = ClienteDAO::getClientes();

        if ($lista->count() == 0) {
            echo '<h3> Nenhum cliente cadastrado! </h3>';
        } else {
            ?>





            <!-- montar uma tabela -->
            <table border="3">
                <!-- cabeçalho da tabela -->
                <tr> 
                    <!-- para fazer uma célula de uma coluna -->
                    <th>Código</th>
                    <th>Foto</th>
                    <th>Nome do Cliente</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Cidade</th>
                    <th>Sexo</th>
                    <th>Tem Filhos</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>

                <?php
                foreach ($lista as $cli) {
                    echo '<tr>';
                    echo '  <td>' . $cli->getId() . '</td>';
                    echo '  <td><img src="fotos_clientes/' . $cli->getFoto() . '" width="30px"/></td>';
                    echo '  <td>' . $cli->getNome() . '</td>';
                    echo '  <td>' . $cli->getCPF() . '</td>';
                    echo '  <td>' . $cli->getTelefone() . '</td>';
                    echo '  <td>' . $cli->getEmail() . '</td>';
                    echo '  <td>' . $cli->getCidade()->getNome() . '</td>';
                 

                    if ($cli->getSexo() == 'f')
                        echo '  <td>Feminino</td>';
                    else
                        echo '  <td>Masculino</td>';



                    if ($cli->getFilhos())
                        echo '  <td>Sim</>';
                    else
                        echo '  <td>Não</>';
                    
                    echo '  <td><a href="frmCliente.php?editar&idCliente='.$cli->getId().'" ><button>Editar</button></a></td>';
                    echo '  <td><a href="controller/salvarCliente.php?excluir&idCliente='.$cli->getId().'" ><button>Excluir</button></a></td>';
                    echo '</tr>';
             
                }
                ?>


            </table>

            <?php
        }
        ?>

    </body>
</html>

<?php
}else {
    header("Location: indx.php");
    
}


