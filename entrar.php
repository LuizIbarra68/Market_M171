<?php

include_once 'model/clsCliente.php';
include_once 'dao/clsClienteDAO.php';
include_once 'dao/clsConexao.php';

$login = $_POST['txtLogin'];
$senha = $_POST['txtSenha'];

$senha = md5($senha);

$cliente = ClienteDAO::logar($login, $senha);
if( $cliente == NULL ){
    echo '<body onload="window.history.back()" >';
} else {
    session_start();
    $_SESSION['logado'] = TRUE;
    $_SESSION['idCliente'] = $cliente->getId();
    $_SESSION['nome'] = $cliente->getNome();
    $_SESSION['foto'] = $cliente->getFoto();
    
    header("Location: ".$_SERVER['HTTP_REFERER']);
}

