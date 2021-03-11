<?php
    require("conexao.php");

    Class Acesso{
        private $con = null;

        public function __construct($conexao){
            $this->con = $conexao;
        }

        public function send(){
            if(empty($_POST) || $this->con == null){
                echo json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro interno no servidor."));
                return;
            }

            switch(true){
                case (isset($_POST["type"]) && $_POST["type"] == "login" && isset($_POST["email"]) && isset($_POST["senha"])):
                    echo $this->login($_POST["email"], $_POST["senha"]);
                    break;

                case (isset($_POST["type"]) && $_POST["type"] == "cadastro" && isset($_POST["email"]) && isset($_POST["nome"]) && isset($_POST["cidade"])):
                    echo $this->cadastro($_POST["email"], $_POST["nome"], $_POST["cidade"]);
                    break;
            }
        }

        public function login($email, $senha){
            $conexao = $this->con;

            $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
            $query->execute(array($email, $senha));

            if($query->rowCount()){
                $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

                session_start();
                $_SESSION["usuario"] = array($user["nome"], $user["adm"], $user["id"]);

                return json_encode(array("erro" => 0));
            }else{
                return json_encode(array("erro" => 1, "mensagem" => "Email e/ou senha incorretos."));
            }
        }

        public function cadastro($email, $nome, $cidade){
            $conexao = $this->con;

            $query = $conexao->prepare("INSERT INTO usuarios (email, nome, cidade, adm) VALUES (?, ?, ?, ?)");
            
            if($query->execute(array($email, $nome, $cidade, 0))){
                session_start();
                $_SESSION["usuario"] = array($nome, 0);
                
                return json_encode(array("erro" => 0));
            }else{
                return json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro ao cadastrar usuario."));
            }
        }
    };

    $conexao = new Conexao();
    $classe  = new Acesso($conexao->conectar());
    $classe->send();
?>