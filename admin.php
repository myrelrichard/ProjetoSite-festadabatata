<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        echo "<script>window.location = 'dashboard.php'</script>";
    }
?>
<html>

    <head>
        <meta charset="UTF-8" />
        <title>Festa da batata</title>
        <link rel="stylesheet" type="text/css" href="style/acesso.css" />
        <script type="text/javascript" src="script/jquery.js"></script>
        <script type="text/javascript" src="script/acesso.js"></script>
        <link rel="icon" type="imagem/png" href="assets/img/logo/logo.png" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="style/boxicons/css/boxicons.min.css" rel="stylesheet">
  
    </head>
    <body>
        <header>Festa da batata</header>
         <div id="subheader">
            <ul>
                <li><a href="index.html">Página inicial</a></li>
                
            </ul>
        </div>
        <br/>
    <section id="services" class="services">
        <div id="mensagem"></div>
        <div class="container" >
            <div id="formulario" class="row" >
            <center><form id="formularioLogin" class="icon-box col-lg-4 col-md-6">
                <span class="title">Acesse sua conta:</span>
                <div id="linha" class="oi">
                    <label for="email">Email:</label><br/>
                    <input type="text" name="email" id="email" />
                </div>
                <div id="linha">
                    <label for="senha">Senha:</label><br/>
                    <input type="password" name="senha" id="senha" />
                </div>
                <div id="button">
                    <center><button id="btnEntrar">Entrar</button></center>
                </div>
            </form></center>

          
            
        </dir>
        </div>
        </section>
        <center><div class="footer2">
        <a href='https://www.instagram.com/neabicang/?igshid=1hgg9ac8y3dro'>Copyright © 2020 - NEABI - Canguaretama IFRN</a>
    </div></center>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    </body>
    
</html>