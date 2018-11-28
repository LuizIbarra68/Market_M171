<?php



/**
 * Description of clsPedidoDAO
 *
 * @author 181700008
 */
class PedidoDAO {
    public static function inserir( $pedido ){
        $sql = "INSERT INTO pedidos "
                ." (pagamento, endereco, horario, codCliente) "
                ." VALUES ("
                ." '".$pedido->getPagamento()."' , "
                ." '".$pedido->getEndereco()."' , "
                ." '".$pedido->getHorario()."' , "
                ."  ".$pedido->getCliente()->getId()." ) ";
        
        $idPedido = Conexao::executarComRetornoId($sql);
        return $idPedido;
    }
}
