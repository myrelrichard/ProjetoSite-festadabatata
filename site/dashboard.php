<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");

        $conexaoClass = new Conexao();
        $conexao = $conexaoClass->conectar();

        $adm  = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = 'index.php'</script>";
    }
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="style/dashboard2.css" />
        <link rel="icon" type="imagem/png" href="assets/img/logo/logo.png" />

        <title>Festa Da Batata <?php echo $nome; ?></title>
    </head>
    <body>
        <?php if($adm): ?>
        <header>
            <div id="content">
                <div id="user">
                    <span><?php echo $adm ? $nome." (ADM)" : $nome; ?></span>
                </div>
                <br/>
                <br/>
                <br/>

                <span class="logo">Lista de visitantes</span>
                <div id="logout">
                    <a href="acoes/logout.php"><button>Sair</button></a>
                </div>
            </div>
        </header>

        <div id="content" >
            
                <div id="tabelaUsuarios">
                    <span class="title">Lista de usuários</span>

                    <table>
                        <thead>
                            <tr>
                                <td>Email</td>
                                <td>Nome</td>
                                <td>Cidade</td>
                                <td>Comentários</td>
                            </tr>                
                        </thead>
                        <tbody>
                            <?php
                                $query = $conexao->prepare("SELECT * FROM usuarios");
                                $query->execute();
                        
                                $users = $query->fetchAll(PDO::FETCH_ASSOC);

                                for($i = 0; $i < sizeof($users); $i++):
                                    $usuarioAtual = $users[$i];
                            ?>
                            <tr>
                                <td ><?php echo $usuarioAtual["email"]; ?></td>
                                <td><?php echo $usuarioAtual["nome"]; ?></td>
                                <td><?php echo $usuarioAtual["cidade"]; ?></td>
                                <td><?php echo $usuarioAtual["coment"]; ?></td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>            
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>