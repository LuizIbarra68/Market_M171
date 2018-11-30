<?php
if(session_status() != PHP_SESSION_ACTIVE ){
    session_start();
}
?>


<header> 
    <!--tag "a" serve para criar um link -->
    <!--href serve para colocar o local pra onde direcionar-->
    <a href="index.php"><button>Início</button></a>
    
    <a href="produtos.php"><button>Produto</button></a>
    
    <a href="meuCarrinho.php"><button>Carrinho</button></a>
    
    <?php
        if( isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE){
    ?>

    <a href="cidades.php"><button>Cidade</button></a>

    <a href="clientes.php"><button>Clientes</button></a>

    <a href="categorias.php"><button>Categoria</button></a>
    
    <a href="pedidos.php"><button>Pedidos</button></a>

    <?php
          echo "Olá, ".$_SESSION['nome'];
          echo '<a href="sair.php"><button>Sair</button></a>';
        }else{
    
            
        
    ?>
    
    |
    
    <form action="entrar.php" method="POST" >
        <input type="text" name="txtLogin" required placeholder="E-mail ou CPF" />
        <input type="password" name="txtSenha" placeholder="Senha: " required />
        
        <input type="submit" value="Entrar" />
    </form>
    
    <a href="frmCliente.php"><button>Cadastre-se</button></a>
    <?php
        }
    ?>
    
    

</header>
<hr>