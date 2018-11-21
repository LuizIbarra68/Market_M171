<?php

include_once 'model/clsCliente.php';
include_once 'dao/clsClienteDAO.php';
include_once 'dao/clsConexao.php';

$login = $_POST['txtLogin'];
$senha = $_POST['txtSenha'];

$senha = md5($senha);

$clente = ClienteDAO::logar($login, $senha);

