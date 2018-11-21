<?php

include_once '../model/clsCidade.php';
include_once '../dao/clsCidadeDAO.php';
include_once '../dao/clsConexao.php';

//.. pra voltar um nível e ir pra raiz do projeto
if (isset($_REQUEST ['inserir'])) {
    //isset verifica se existe um valor ou não
    //$_REQUEST PEGA TODOS OS VALORES TANTO GET OU POST OU NA URL
    //se existe o inserir é pq o usuario clicou em salvar pra salvar uma cidade

    $cidade = new Cidade();
    $cidade->setNome($_POST['txtNome']);

    CidadeDAO::inserir($cidade);

    header("Location: ../cidades.php");
}

if( isset($_REQUEST['excluir']) ){
    $id = $_REQUEST['idCidade'];
    echo '<br><br><hr>'
    . '<h3>Confirma a exclusão da Cidade
            ? </h3>'
            . '<br><hr>';
            echo '<a href="?confirmaExcluir&idCidade='.$id.'"><button>Sim</button></a> ';
            echo '<a href="../cidades.php" ><button>Não</button></a>';

}

if(isset( $_REQUEST['confirmaExcluir'] )){
    $id = $_REQUEST['idCidade'];
  
    CidadeDAO::excluir($id);
    header("Location: ../cidades.php");
    
    
    
}
if (isset($_REQUEST['editar'])) {

    $id = $_REQUEST['idCidade'];
    $cidade = CidadeDAO::getCidadeById($id);
   
   
    $cidade->setNome($_POST['txtNome']);
   
    
    CidadeDAO::editar($cidade);
    header("Location: ../cidades.php");
    
    
}

    
