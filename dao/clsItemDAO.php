<?php



/**
 * Description of clsItemDAO
 *
 * @author 181700008
 */
class ItemDAO {
    public static function inserir( $item ){
        $sql = "INSERT INTO itens "
                ." (codPedido, codProduto, preco, quantidade) "
                ." VALUES ( "
                . $item->getPedido()->getId() ." , "
                . $item->getProduto()->getId()." , "
                . $item->getPreco()           ." , "
                . $item->getQuantidade()      ." ) ";
        Conexao::executar($sql);
    }
    public static function getItens($idPedido){
        $sql = "SELECT p.id, p.nome, p.foto, i.preco,"
                . "i.quantidade, i.id "
                . " FROM produtos p "
                . " INNER JOIN itens i ON i.codProduto = p.id "
                . " WHERE i.codPedido = ".$idPedido;
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        
        while (list($codPro, $nome, $foto, $preco, $qtd, $codItem)
                = mysqli_fetch_row($result)){
            $produto = new Produto();
            $produto->setId($codPro);
            $produto->setNome($nome);
            $produto->setFoto($foto);
            
            $item = new Item();
            $item->setId($codItem);
            $item->setProduto($produto);
            $item->setPreco($preco);
            $item->setQuantidade($qtd);
            
            $lista->append($item);
        }
        return $lista;
    }
}
