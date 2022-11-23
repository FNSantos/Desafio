let rota = "../router.php"

let modo = ""

function obterTodosProdutos(){

    $.post(rota, {

        classe:"produto",
        acao:"listaProdutos"

    }).done(function(dados){

        const produtos = JSON.parse(dados);
        
        var dataInner = "";
        for(var i = 0; i < produtos.length; i++ ){
            dataInner += '<div class="form-check">'+
                '<input class="form-check-input" type="checkbox" name="exampleRadios" id="listaDeProdutos" value="'+produtos[i]['id']+'" checked>'+
                '<label class="form-check-label" for="listaDeProdutos">'+
                produtos[i]['produto']+
                '</label>'+
            '</div>';
//            console.log(clientes[i]['nome']);
            
        }
        $("#produtos").html(dataInner);

    });

}

function obterTodosClientes(){

    $.post(rota, {

        classe:"cliente",
        acao:"listaClientes"

    }).done(function(dados){
        const clientes = JSON.parse(dados);
        var dataInner = "";
        for(var i = 0; i < clientes.length; i++ ){
            dataInner += '<div class="form-check">'+
                '<input class="form-check-input" type="radio" name="exampleRadios" id="listaDeClientes" value="'+clientes[i]['id']+'" checked>'+
                '<label class="form-check-label" for="listaDeClientes">'+
                clientes[i]['nome']+
                '</label>'+
            '</div>';
//            console.log(clientes[i]['nome']);
            
        }
        $("#clientes").html(dataInner);

    });

}

$(document).ready(function(){

    // obterAutenticacao();

    obterTodosClientes();
    obterTodosProdutos();
            
    $("#btn_enviar").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

});