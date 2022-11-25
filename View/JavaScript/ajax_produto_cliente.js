let rota = "../router.php"

let modo = ""


function inserir(){
    
    //Criando lista de produtos selecionados
    var produtos = [];
    $('input[name="radioButton"]:checked').each(function() {
        produtos.push(this.value);
    });
    
    $.post(rota, {

        classe:"fatura",
        acao:"inserir",
        idProdutos:produtos,
        idCliente:$('input[name="clientes"]:checked').val(),
        dataVencimento:$("#data_vencimento").val()

    }).done(function(dados){

        alert("CADASTRADO COM SUCESSO");

//        obterTodos();

    });

}

function obterTodosProdutos(){

    $.post(rota, {

        classe:"produto",
        acao:"listaProdutos"

    }).done(function(dados){

        const produtos = JSON.parse(dados);
        
        var dataInner = "";
        for(var i = 0; i < produtos.length; i++ ){
            var id = produtos[i]['id'];
            var produto = produtos[i]['produto'];
            var valor = produtos[i]['valor'];
            
            dataInner += '<div class="form-check">'+
                '<input class="form-check-input" type="checkbox" name="radioButton" id="listaDeProdutos'+id+'" value="'+id+'" checked>'+
                '<label class="form-check-label" for="listaDeProdutos'+id+'">'+
                produto+"  - R$"+valor+
                '</label>'+
            '</div>';
            
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
            var id = clientes[i]['id'];
            var nome = clientes[i]['nome'];
            
            dataInner += '<div class="form-check">'+
                '<input class="form-check-input" type="radio" name="clientes" id="listaDeClientes'+id+'" value="'+id+'" checked>'+
                '<label class="form-check-label" for="listaDeClientes'+id+'">'+nome+
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
            
    $("#btn_salvar").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

});