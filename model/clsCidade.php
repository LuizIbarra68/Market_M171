<?php



class Cidade {

    private $id;
    private $nome;

    public function __construct($id = NULL, $nome = NULL) {
        $this->id = $id;
        $this->nome = $nome;
    }

    //representar um atributo ->
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

}
