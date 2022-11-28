let rota = "../router.php"

let modo = ""

function obterTodos(){

    $.post(rota, {

        classe:"fatura",
        acao:"obterTodos"

    }).done(function(dados){

        $("#table").html(dados);

    });

}

function obterUm(){
    
    id_produto = $("#id_produto").val();
    
    if(id_produto !== ""){
    
        $.post(rota, {

            classe:"produto",
            acao:"obterUm",
            id:$("#id_produto").val(),

        }).done(function(dados){

            let produto = JSON.parse(dados);

            $("#txt_produto").val(produto["PRODUTO"]);
            $("#txt_valor").val(produto["VALOR"]);
            $("#btn_enviar").text('Atualizar');
            modo = "atualizar";

        });
        
    }

}

function buscar(){

    $.post(rota, {

        classe:"produto",
        acao:"buscar",
        busca:$("#busca").val()

    }).done(function(dados){

        $("#table").html(dados);

    });

}

function remover(idFatura){
    
    $.post(rota, {

        classe:"fatura",
        acao:"remover",
        idFatura: idFatura
        
    }).done(function(dados){
        console.log(dados);
        alert('REMOVIDO COM SUCESSO!!')
        obterTodos();

    });

}

$(document).ready(function(){

    // obterAutenticacao();

    obterTodos();
    obterUm();


    $("#btn_enviar").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

});