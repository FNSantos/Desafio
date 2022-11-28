<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gerar compra</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
        <script src="JavaScript/ajax_produto_cliente.js" charset="utf-8"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <style>
            label, .form-check-input:hover{
                cursor: pointer;
            }
            #clientes, #produtos{
                width: 50%;
                min-height: 300px;
                float: left;
                padding: 30px;
            }
            
        </style>
    </head>
    <body>
        <div class="container" style="margin-top:10px;">
            <?php include 'menu.php';?>
            <!--
                DIV clientes e produtos recebem atravez do javascript as informações
                    dos clientes e dos produtos para fazer geração da fatura
            -->
            <div id="clientes"></div>
            <div id="produtos"></div>            
            <br>
            <div class='col-md-3'>
                <label for="data-pagamento">Data de Vencimento</label>         
                <div class="input-group date" data-date-format="dd/mm/yyyy">
                  <input type="date" class="form-control" id="data_vencimento" required>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" id="btn_salvar">Salvar</button>
            <div id="table"></div>
        </div>
    </body>
</html>