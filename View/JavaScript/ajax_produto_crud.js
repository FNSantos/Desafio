let rota = "../router.php"

let modo = ""

function inserir(){
    
    $.post(rota, {

        classe:"produto",
        acao:"inserir",
        produto:$("#txt_produto").val(),
        valor:$("#txt_valor").val()

    }).done(function(dados){

        alert("CADASTRADO COM SUCESSO");

        obterTodos();

    });

}

function obterTodos(){

    $.post(rota, {

        classe:"produto",
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

function atualizar(){
    
    $.post(rota, {

        classe:"produto",
        acao:"atualizar",
        idProduto: $("#id_produto").val(),
        produto:$("#txt_produto").val(),
        valor:$("#txt_valor").val()
    }).done(function(dados){
        
        modo = "inserir";
        alert('ALTERADO COM SUCESSO!!');
        window.location.href = 'cadastro_produto.php';


    });

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

function remover(idProduto){
    
    $.post(rota, {

        classe:"produto",
        acao:"remover",
        idProduto: idProduto
        
    }).done(function(dados){
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