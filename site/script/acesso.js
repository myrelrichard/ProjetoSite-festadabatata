$(function(){
    $("button#btnEntrar").on("click", function(e){
        e.preventDefault();

        var campoEmail = $("form#formularioLogin #email").val();
        var campoSenha = $("form#formularioLogin #senha").val();

        if(campoEmail.trim() == "" || campoSenha.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acoes/acesso.php",
                type: "POST",
                data: {
                    type: "login",
                    email: campoEmail,
                    senha: campoSenha
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "dashboard.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });

    $("button#btnCadastrar").on("click", function(e){
        e.preventDefault();

        var campoEmail = $("form#formularioCadastro #emailCadastro").val();
        var campoNome = $("form#formularioCadastro #nomeCadastro").val();
        var campoCidade = $("form#formularioCadastro #cidade").val();

        if(campoEmail.trim() == "" || campoNome.trim() == "" || campoCidade.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acoes/acesso.php",
                type: "POST",
                data: {
                    type: "cadastro",
                    email: campoEmail,
                    nome: campoNome,
                    cidade: campoCidade
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{

                        window.location = "cadastrado.html";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });

    $("button.change").on("click", function(){
        $("div#formulario").toggleClass("cadastro");

        $("form#formularioCadastro").toggle();
        $("form#formularioLogin").toggle();
        
        $("div#textoLogin").toggle();
        $("div#textoCadastro").toggle();
    });
});