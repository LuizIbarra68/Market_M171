<?php
session_start();
if( isset($_SESSION['logado'])  && $_SESSION['logado'] ){
    
    $idCliente = 0;
    if( !isset( $_SESSION['admin']) || !$_SESSION['admin'] ){
        $idCliente = $_SESSION['idCliente'];
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Market M171 - Pedidos</title>
    </head>
    <body>
        <?php
        require_once 'menu.php';
        ?>
        <h1 align="center">Pedidos</h1>
        <br><br><br>
        
        <?php
        
        $lista = PedidoDAO::getPedidos($idCliente);
        
        if (count($lista) == 0 ){
            echo '<h3>Não existem pedidos cadastrados!</h3>';
        } else {
        
            echo '<table border="1"';
            echo ' <tr> ';
            echo ' <th>Código</th> ';
            echo ' <th>Data</th> ';
            echo ' <th>Endereço</th> ';
            echo ' <th>Pagamento</th> ';
            echo ' <th>Cliente</th> ';
            echo ' <th>Valor</th> ';
            echo ' <th>Visualizar Produtos</th> ';
            echo ' </tr> ';
            
            foreach ($lista as $pedido){
                echo '<tr>';
                echo '  <td>'.$pedido.getId().'</td>';
                echo '  <td>'.$pedido.getHorario().'</td>';
                echo '  <td>'.$pedido.getEndereco().'</td>';
                echo '  <td>'.$pedido.getPagamento().'</td>';
                echo '  <td>'.$pedido.getCliente()->getNome().'</td>';
                echo '  <td>'.$pedido.getValor().'</td>';
                echo '  <td><a href="itens.php?idPedidos='.$pedido->getId().'">'
                    .'  <button>Ver Produtos</button></a></td>';
                    echo '</tr>';
            }
            echo '</table>';
        }
            
        ?>
        
    </body>
</html>
<?php
} else {
    
    header("Location: index.php");    
}
?>
