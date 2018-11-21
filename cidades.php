
<?php
include_once 'model/clsCidade.php';
include_once 'dao/clsCidadeDAO.php';
include_once 'dao/clsConexao.php';

$nome = "";

$action = "inserir";

if (isset($_REQUEST['editar'])) {
    $id = $_REQUEST['idCidade'];
    $cidade = CidadeDAO::getCidadeById($id);
    $nome = $cidade->getNome();
   
    

    $action = "editar&idCidade=" . $cidade->getId();
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Market M171 - Cidades</title>
    </head>
    <body>

        <?php
        require_once 'menu.php';
        ?>

        <h1 align="center">Cidades</h1>

        <br><br>

        <form action="controller/salvarCidade.php?<?php echo $action;?>" method="POST">
            <label>Nome: </label>
            <input type="text" name="txtNome" value="<?php echo $nome; ?>" />
            <input type="submit" value="Salvar"/>
            <!-- ponto de interrogação serve para passar algum parametro -->
        </form>

        <hr>


        <?php
        $lista = CidadeDAO::getCidades();
        if ($lista->count() == 0) {
            //se não tiver nenhuma cidade cadastrada
            echo'<h2><b>Nenhuma cidade cadastrada<b><h2>';
        } else {
            ?>
            <!-- montar uma tabela -->
            <table border="3">
                <!-- cabeçalho da tabela -->
                <tr> 
                    <!-- para fazer uma célula de uma coluna -->
                    <th>Código</th>
                    <th>Nome da Cidade</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
    <?php
    foreach ($lista as $cidade) {
        //for para percorrer arrays($lista que recebe uma lista de cidades cadastradas)
        echo '<tr>
                                <td>' . $cidade->getId() . '</td>
                                 <td>' . $cidade->getNome() . '</td>
                                 <td>
                                    <a href="?editar&idCidade=' . $cidade->getId() . '">
                                        <button>Editar</button></a></td>
                                        <td>
                                            <a href=controller/salvarCidade.php?excluir&idCidade=' . $cidade->getId() . '">
                                                <button>Excluir</button></a>
                                                </td>
                            </tr>';
    }
    ?>

            </table>
    <?php
}
?>
        <br><br><br>

    </body>
</html>
