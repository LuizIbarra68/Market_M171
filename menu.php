<header> 
    <!--tag "a" serve para criar um link -->
    <!--href serve para colocar o local pra onde direcionar-->
    <a href="index.php"><button>Início</button></a>

    <a href="cidades.php"><button>Cidade</button></a>

    <a href="clientes.php"><button>Clientes</button></a>

    <a href="categorias.php"><button>Categoria</button></a>

    <a href="produtos.php"><button>Produto</button></a>
    
    |
    
    <form action="entrar.php" method="POST" >
        <input type="text" name="txtLogin" required placeholder="E-mail ou CPF" />
        <input type="password" name="txtSenha" placeholder="Senha: " required />
        
        <input type="submit" value="Entrar" />
    </form>
    

</header>
<hr>