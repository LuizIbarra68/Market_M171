<?php

class CategoriaDAO {

    public static function inserir($categoria) {
        $sql = "INSERT INTO categorias ( nome ) VALUES "
                . " ('" . $categoria->getNome() . "'); ";
        Conexao::executar($sql);
        //quando o método é static n preciso declarar um objeto daquele tipo pra executar o método
    }

    public static function editar($categoria) {
        $sql = "UPDATE categorias SET "
                . " nome= '" . $categoria->getNome() . "' "
                . " WHERE id = " . $categoria->getId();
        Conexao::executar($sql);
        //quando o método é static n preciso declarar um objeto daquele tipo pra executar o método
    }
    
    
    
public static function excluir($idCategoria) {
        $sql = "DELETE FROM categorias "
                . " WHERE id = " .$idCategoria;
        Conexao::executar($sql);
        //quando o método é static n preciso declarar um objeto daquele tipo pra executar o método
    }

    public static function getCategorias() {
        $sql = "SELECT id, nome FROM categorias";
        $result = Conexao::consultar($sql);

        //inicializar a lista vazia
        $lista = new ArrayObject();
        if ($result != NULL) {
            while (list($_id, $_nome) = mysqli_fetch_row($result)) {
                //mysqli_fetch_row vai pegar a linha e vai retornar um array contendo as colunas que é informado pelo list
                // e as informações são atribuidas pras variáveis de id e nome

                $categoria = new Categoria();
                $categoria->setId($_id);
                $categoria->setNome($_nome);
                $lista->append($categoria);

                //pra cada volta cria uma cidade, seta os dados dela e adiciona ela na lista
            }
        }
        return $lista;
    }
    public static function getCategoriaById($id) {
        $sql = "SELECT id, nome "
                . " FROM categorias "                
                . " WHERE id = " . $id;


        $result = Conexao::consultar($sql);

        list($cod, $nome ) = mysqli_fetch_row($result);

        $categoria = new Categoria();
        $categoria->setId($cod);
        $categoria->setNome($nome);

       

        return $categoria;
    }
    
   
}
