

<?php
include_once '../dao/clsPedidoDAO.php';
include_once '../model/clsPedido.php';
if( isset($_REQUEST['inserir']) ){
    
    $pagamento = $_POST['pagamento'];
    $pagamento = $_POST['txtEndereco'];
    
    session_start();
    include_once '../model/clsCliente.php';
    include_once '../model/clsProduto.php';
    include_once '../model/clsItem.php';
    include_once '../dao/clsItemDAO.php';
    $cliente = new Cliente();
    $cliente->setId($_SESSION['idCliente']);
    date_default_timezone_get('America/Sao_Paulo');
    $horario = date("y-m-d H:i:s");
    
    $pedido = new Pedido();
    $pedido->setEndereco($endereco);
    $pedido->setPagamento($pagamento);
    $pedido->setHorario($horario);
    $pedido->setCliente($cliente);
    
    $idPedido = PedidoDAO::inserir($pedido);
    $pedido->setId( $pedido);
    foreach ($_SESSION['carrinho'] as $idProduto => $qtd) {
        $produto = ProdutoDAO::getProdutoById($idProduto);
        $item = new Item();
        $item->setProduto($produto);
        $item->setPedido($pedido);
        $item->setPreco($produto->getPreco());
        $item->setQuantidade($qtd);
        ItemDAO::inserir($item);
        
        
    }
    unset($_SESSION['carrinho']);
    header("Location: ../"
            . "pedidos.php");
}

