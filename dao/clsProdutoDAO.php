<?php
//include_once 'dao/clsConexao.php';

class ProdutoDAO {

    public static function inserir($produto) {
        $sql = "INSERT INTO produtos "
                . "( nome, preco, quantidade,"
                . " foto, codCategoria) VALUES"
                . "('" . $produto->getNome() . "',"
                . " '" . $produto->getPreco() . "',"
                . " '" . $produto->getQuantidade() . "',"
                . " '" . $produto->getFoto() . "',"
                . " " . $produto->getCategoria()->getId() . " "
                . " ); ";


        Conexao::executar($sql);
     
    }

    public static function editar($produto) {
        $sql = "UPDATE produtos SET"
                . " nome = '" . $produto->getNome() . "',"
                . " preco = '" . $produto->getPreco() . "',"
                . " quantidade = '" . $produto->getQuantidade() . "',"
                . " foto = '" . $produto->getFoto() . "',"
                . " codCategoria = " . $produto->getCategoria()->getId()
                . " WHERE id = " . $produto->getId();

        Conexao::executar($sql);
    }

    public static function excluir($produto) {
        $sql = "DELETE FROM produtos"
                . " WHERE id = " . $produto->getId();
        Conexao::executar($sql);
    }

    public static function getProdutos() {
        $sql = "SELECT p.id, p.nome, p.preco, p.quantidade,"
                . " p.foto, c.id, c.nome "
                . " FROM produtos p "
                . " INNER JOIN categorias c "
                . " ON p.codCategoria = c.id "
                . " ORDER BY p.nome ";

        
        
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        while (list($cod, $nome, $preco, $quantidade,
        $foto, $codCat, $nomeCat) = mysqli_fetch_row($result)) {

            $categoria = new Categoria();
            $categoria->setId($codCat);
            $categoria->setNome($nomeCat);

            $produto = new Produto();
            $produto->setId($cod);
            $produto->setNome($nome);
            $produto->setPreco($preco);
            $produto->setQuantidade($quantidade);
           
            $produto->setFoto($foto);
            $produto->setCategoria($categoria);
           
            $lista->append($produto);
        }

        return $lista;
    }

    public static function getProdutoById($id) {
        $sql = "SELECT c.id, c.nome, c.preco, c.quantidade,"
                . " c.foto, d.id, d.nome "
                . " FROM produtos c "
                . " INNER JOIN categorias d "
                . " ON c.codCategoria = d.id "
                . " WHERE c.id = " . $id;
                


        $result = Conexao::consultar($sql);

        list($cod, $nome, $preco, $quantidade, $foto, $codCat, $nomeCat) = mysqli_fetch_row($result);

        $categoria = new Categoria();
        $categoria->setId($codCat);
        $categoria->setNome($nomeCat);

        $produto = new Produto();
        $produto->setId($cod);
        $produto->setNome($nome);
        $produto->setPreco($preco);
        $produto->setQuantidade($quantidade);
        $produto->setFoto($foto);
        $produto->setCategoria($categoria);
       
        return $produto;
    }
}
