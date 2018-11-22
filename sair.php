<?php

session_start();

if( isset($_SESSION['logado']))
    unset ($_SESSION['logado']);

if( isset($_SESSION['idCliente']))
    unset ($_SESSION['idCliente']);

if( isset($_SESSION['nome']))
    unset ($_SESSION['nome']);

if( isset($_SESSION['fot']))
    unset ($_SESSION['foto']);

session_destroy();

header("Location: index.php");

