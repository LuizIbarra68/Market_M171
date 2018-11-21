<?php

include_once '../model/clsCategoria.php';
include_once '../dao/clsCategoriaDAO.php';
include_once '../dao/clsConexao.php';

//.. pra voltar um nível e ir pra raiz do projeto
if (isset($_REQUEST ['inserir'])) {
    //isset verifica se existe um valor ou não
    //$_REQUEST PEGA TODOS OS VALORES TANTO GET OU POST OU NA URL
    //se existe o inserir é pq o usuario clicou em salvar pra salvar uma cidade

    $categoria = new Categoria();
    $categoria->setNome($_POST['txtNome']);

    CategoriaDAO::inserir($categoria);

    header("Location: ../categorias.php");
}
    if( isset($_REQUEST['excluir']) ){
    $id = $_REQUEST['idCategoria'];
   
    echo '<br><br><hr>'
    . '<h3>Confirma a exclusão da Categoria? </h3>'
            . '<br><hr>';
            echo '<a href="?confirmaExcluir&idCategoria='.$id.'"><button>Sim</button></a> ';
            echo '<a href="../categorias.php" ><button>Não</button></a>';
}

if(isset( $_REQUEST['confirmaExcluir'] )){
    $id = $_REQUEST['idCategoria'];
    
    CategoriaDAO::excluir($id);
    header("Location: ../categorias.php");
    
    
    
}
if (isset($_REQUEST['editar'])) {

    $id = $_REQUEST['idCategoria'];
    $categoria = CategoriaDAO::getCategoriaById($id);
   
   
    $categoria->setNome($_POST['txtNome']);
   
    
    CategoriaDAO::editar($categoria);
    header("Location: ../categorias.php");
    
}
