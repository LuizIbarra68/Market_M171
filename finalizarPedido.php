<?php

    session_start();
    
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Market M171 - Finalizar Pedido</title>
    </head>
    <body>
        <?php
         require_once 'menu.php';
        ?>
        <h1 align="center">Finalizar Pedido</h1>
        
        <br><br><br>
        
        <?php
        if( isset($_SESSION['logado']) && $_SESSION['logado'] ){
            ?>
        <form action="controller/salvarPedido.php?inserir"
              method="POST">
            <label>Endereço: </label>
            <input type="text" name="txtEndereco" maxlength="50"/>
            <br><br>
            <label>Forma de Pagamento: </label>
            <select name="pagamento">
                <option value="0">Selecione</option>
                <option value="boleto">bBleto</option>
                <option value="credito01">Credito 1x</option>
                <option value="credito02">Credito 2x</option>
                <option value="credito03">Credito 3x</option>
            </select>
            <br><br>
            
            <input type="submit" value="Finalizar Compra" />
            
                
        </form>
        
        
         <?php   
        } else {
            echo '<h3>Você deve realizar seu login &uarr; </h3>';    
        }
        ?>
        
    </body>
</html>
