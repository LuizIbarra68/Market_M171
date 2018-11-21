<?php

class CidadeDAO {

    public static function inserir($cidade) {
        $sql = "INSERT INTO cidades ( nome ) VALUES "
                . " ('" . $cidade->getNome() . "'); ";
        Conexao::executar($sql);
        //quando o método é static n preciso declarar um objeto daquele tipo pra executar o método
    }

    public static function editar($cidade) {
        $sql = "UPDATE cidades SET "
                . " nome= '" . $cidade->getNome() . "' "
                . " WHERE id = " . $cidade->getId();
        Conexao::executar($sql);
        //quando o método é static n preciso declarar um objeto daquele tipo pra executar o método
    }

    public static function excluir($idCidade) {
        $sql = "DELETE FROM cidades "
                . " WHERE id = " . $idCidade;
        Conexao::executar($sql);
        //quando o método é static n preciso declarar um objeto daquele tipo pra executar o método
    }

    public static function getCidades() {
        $sql = "SELECT id, nome FROM cidades ORDER BY nome";
        $result = Conexao::consultar($sql);

        //inicializar a lista vazia
        $lista = new ArrayObject();
        if ($result != NULL) {
            while (list($_id, $_nome) = mysqli_fetch_row($result)) {
                //mysqli_fetch_row vai pegar a linha e vai retornar um array contendo as colunas que é informado pelo list
                // e as informações são atribuidas pras variáveis de id e nome

                $cidade = new Cidade();
                $cidade->setId($_id);
                $cidade->setNome($_nome);
                $lista->append($cidade);

                //pra cada volta cria uma cidade, seta os dados dela e adiciona ela na lista
            }
        }
        return $lista;
    }
     public static function getCidadeById($id) {
        $sql = "SELECT c.id, c.nome "
                . " FROM cidades c "
               
                
                . " WHERE c.id = " . $id;


        $result = Conexao::consultar($sql);

        list($cod, $nome ) = mysqli_fetch_row($result);

        $cidade = new Cidade();
        $cidade->setId($cod);
        $cidade->setNome($nome);

       

        return $cidade;
    }

}
