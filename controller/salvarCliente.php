<?php

include_once '../model/clsCliente.php';
include_once '../model/clsCidade.php';
include_once '../dao/clsClienteDAO.php';
include_once '../dao/clsConexao.php';

if (isset($_REQUEST['inserir'])) {

    $senha = $_POST['txtSenha'];
    $senhaConfirma = $_POST['txtSenhaConfirma'];

    if ($senha != $senhaConfirma || $_POST['cidade'] == 0) {
        echo "<body onload='window.history.back();'>";
    } else {

        $cliente = new Cliente();
        $cliente->setNome($_POST['txtNome']);
        $cliente->setTelefone($_POST['txtTelefone']);
        $cliente->setEmail($_POST['txtEmail']);
        $cliente->setCpf($_POST['txtCPF']);
        if (isset($_POST['cbFilhos'])) {
            $cliente->setFilhos(1);
        } else {
            $cliente->setFilhos(0);
        }
         if (isset($_POST['cbAdmin'])) {
            $cliente->setAdmin(1);
        } else {
            $cliente->setAdmin(0);
        }

        $cliente->setSexo($_POST['rbSexo']);

        $senha = md5($senha);
        //função md5 vai gerar uma nova string a partir da senha que o usuario digitou criptografando ela
        $cliente->setSenha($senha);

        $cid = new Cidade();
        $cid->setId($_POST['cidade']);
        $cliente->setCidade($cid);

        $cliente->setFoto(salvarFoto());

        ClienteDAO::inserir($cliente);
        //voltar para a pagina que lista os clientes.
        header("Location: ../clientes.php");
    }
}


if (isset($_REQUEST['editar'])) {

    $id = $_REQUEST['idCliente'];
    $cliente = ClienteDAO::getClienteById($id);
    if (isset($_FILES['foto']['name']) && ($_FILES['foto']['name'] != "")) {
        $nova_foto = salvarFoto();
        if ($cliente->getFoto() != "sem_foto.png") {
            unlink("../fotos_clientes/" . $cliente->getFoto());
           
        }
         $cliente->setFoto($nova_foto);
    }
    
   
    $cliente->setNome($_POST['txtNome']);
    $cliente->setTelefone($_POST['txtTelefone']);
    $cliente->setEmail($_POST['txtEmail']);
    $cliente->setCpf($_POST['txtCPF']);
    if (isset($_POST['cbFilhos'])) {
        $cliente->setFilhos(1);
    } else {
        $cliente->setFilhos(0);
    }
    if (isset($_POST['cbAdmin'])) {
            $cliente->setAdmin(1);
        } else {
            $cliente->setAdmin(0);
        }


    $cliente->setSexo($_POST['rbSexo']);

    $cid = new Cidade();
    $cid->setId($_POST['cidade']);
    $cliente->setCidade($cid);
    
    ClienteDAO::editar($cliente);
    header("Location: ../clientes.php");
    
    
}

function salvarFoto() {
    $nome_arquivo = "";
    if (isset($_FILES['foto']['name']) && ($_FILES['foto']['name'] != "")) {
        $nome_arquivo = date('YmdHis') . basename($_FILES['foto']['name']);
        $diretorio = "../fotos_clientes/";
        $caminho = $diretorio . $nome_arquivo;

        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
            $nome_arquivo = "sem_foto.png";
        }
    } else {
        $nome_arquivo = "sem_foto.png";
    }
    return $nome_arquivo;
}

if (isset($_REQUEST['excluir'])) {
    $id = $_REQUEST['idCliente'];
    $cliente = ClienteDAO::getClienteById($id);
    echo '<br><br><hr>'
    . '<h3>Confirma a exclusão do Cliente '
    . $cliente->getNome() . '? </h3>'
    . '<br><hr>';
    echo '<a href="?confirmaExcluir&idCliente=' . $id . '"><button>Sim</button></a> ';
    echo '<a href="../clientes.php" ><button>Não</button></a>';
}





if (isset($_REQUEST['confirmaExcluir'])) {
    $id = $_REQUEST['idCliente'];
    $cliente = ClienteDAO::getClienteById($id);
    if ($cliente->getFoto() != "" && $cliente->getFoto() != "sem_foto.png") {
        unlink("../fotos_clientes/" . $cliente->getFoto());
        // unlink comando para excluir o arquivo que está nesse caminho do servidor já que a foto n está salva no banco de dados.
    }
    ClienteDAO::excluir($cliente);
    header("Location: ../clientes.php");
}