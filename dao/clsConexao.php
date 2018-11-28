<?php


class Conexao {

    private static function abrir() {
        //uma função n informa um tipo de retorno
        //estatica pq n vai criar um objeto do tipo dela pra poder usar
        $banco = "market_m171";
        $local = "localhost";
        $usuario = "root";
        $senha = "";

        //função para abrir a conexão
        $conn = mysqli_connect($local, $usuario, $senha, $banco);

        if ($conn) {
            return $conn;
        } else {
            return NULL;
        }
    }

    private static function fechar($conn) {
        mysqli_close($conn);
    }

    public static function executar($sql) {

        //instruções sql
        //
            //self pra executar o metodo na propria classe
        $conn = self::abrir();
        //abrir é para abrir conexão com o banco de dados
        if ($conn) {
       mysqli_query($conn, $sql);
            self::fechar($conn);
            //fechar para fechar a conexão com o banco
        }
    }
    
    public static function executarComRetornoId($sql) {

        //instruções sql
        //
            //self pra executar o metodo na propria classe
        $conn = self::abrir();
        $id = 0;
        //abrir é para abrir conexão com o banco de dados
        if ($conn) {
       mysqli_query($conn, $sql);
       $id = mysqli_insert_id($conn);
       self::fechar($conn);
            //fechar para fechar a conexão com o banco
        }
        return $id;
    }
    public static function consultar($sql) {

        //instruções sql
        //
            //self pra executar o metodo na propria classe
        $conn = self::abrir();
        //abrir é para abrir conexão com o banco de dados
        if ($conn) {
            $result = mysqli_query($conn, $sql);
            //fechar para fechar a conexão com o banco
            self::fechar($conn);
            return $result;
        } else {
            return NULL;
        }
    }

}
