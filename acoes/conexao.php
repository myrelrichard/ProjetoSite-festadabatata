<?php
    Class Conexao{
        
        private $server = "127.0.0.1";
        private $usuario = "root";
        private $senha = "";
        private $banco = "festabatata";
<<<<<<< HEAD
       
         /*
        private $server = "127.0.0.1";
        private $usuario = "batata";
        private $senha = "f3st@b@t123";
        private $banco = "festabatata";
*/
=======
        private $porta = "3309";
        */
        private $server = "localhost";
        private $usuario = "batata";
        private $senha = "f3st@b@t123";
        private $banco = "festabatata";
        private $porta = "3306";
        
>>>>>>> 606d963a7181a68e1d5330eeb99858c8dff0baa2
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