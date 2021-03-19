<?php
    Class Conexao{
        /*
        private $server = "127.0.0.1";
        private $usuario = "root";
        private $senha = "";
        private $banco = "festabatata";
        private $porta = "3306";
        */
        private $server = "localhost";
        private $usuario = "batata";
        private $senha = "f3st@b@t123";
        private $banco = "festabatata";
        private $porta = "3306";
        
        public function conectar(){
            try{
                $conexao = new PDO("mysql:host=$this->server;dbname=$this->banco;port=$this->porta;", $this->usuario, $this->senha);
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }catch(PDOException $erro){
                //$conexao = $erro->getMessage();
                $conexao = null;
            }
            return $conexao;
        }
    };   
?>