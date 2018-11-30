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
    public static function getPedidos($idCliente = 0){
        $where = "";
        if( $idCliente > 0){
            $where = " WHERE p.codCliente = ".$idCliente;
        }
        $sql = " SELECT p.id, p.endereco, p.pagamento,          "
              ." DATE_FORMAT( p.horario, '%d/%m/%y %H:%i:%s' ) ,"
              ." c.id, c.nome,                                  "
              ." ( SELECT SUM( i.preco * i.quantidade )         "
              ." FROM itens i"
              ." INNER JOIN pedidos p2 ON i.codPedido = p2.id     "
              ." WHERE i.codPedido = p.id ) AS valor            "
              ." FROM pedidos  p                                "
              ." INNER JOIN clientes c ON c.id = p.codCliente   "
              . $where."  ORDER BY p.horario DESC               ";
        $result = Conexao::consultar($sql);
        
        $lista = new ArrayObject();
        
        while ( list( $id, $end, $pag, $data, $codCli, $nomeCli, $valor ) 
                = mysqli_fetch_row($result) ){
            
            $cliente = new Cliente();
            $cliente->setId($codCli);
            $cliente->setNome($nomeCli);
            
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEndereco($end);
            $pedido->setPagamento($pag);
            $pedido->setHorario($data);
            $pedido->setCliente($cliente);
            $pedido->setValor($valor);
            
            $lista->append($pedido);
            
        }
        return $lista;
    }
}
