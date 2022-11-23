let rota = "../router.php"

let modo = ""

function inserir(){

    $.post(rota, {

        classe:"cliente",
        acao:"inserir",
        nome:$("#txt_nome").val(),
        email:$("#txt_email").val()

    }).done(function(dados){

        alert("CADASTRADO COM SUCESSO");

        obterTodos();

    });

}

function obterTodos(){

    $.post(rota, {

        classe:"cliente",
        acao:"obterTodos"

    }).done(function(dados){

        $("#table").html(dados);

    });

}

function buscar(){

    $.post(rota, {

        classe:"cliente",
        acao:"buscar",
        busca:$("#busca").val()

    }).done(function(dados){

        $("#table").html(dados);

    });

}

function obterUm(){
    
    id_cliente = $("#id_cliente").val();
    
    if(id_cliente !== ""){

        $.post(rota, {

            classe:"cliente",
            acao:"obterUm",
            id:id_cliente

        }).done(function(dados){

            let cliente = JSON.parse(dados);

            $("#txt_nome").val(cliente["NOME"]);
            $("#txt_email").val(cliente["EMAIL"]);
            $("#btn_enviar").text('Atualizar');
            modo = "atualizar";

        });
        
    }
    

}

function atualizar(){
    
    $.post(rota, {

        classe:"cliente",
        acao:"atualizar",
        idCliente: $("#id_cliente").val(),
        nome:$("#txt_nome").val(),
        email:$("#txt_email").val()

    }).done(function(dados){
        
        modo = "inserir";
        alert('ALTERADO COM SUCESSO!!');
        document.location.href = "http://localhost/CRUD/View/cadastro_cliente.php";


    });

}

function remover(idCliente){
    
    $.post(rota, {

        classe:"cliente",
        acao:"remover",
        idCliente: idCliente
        
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