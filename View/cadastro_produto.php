<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de Produtos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
        <script src="JavaScript/ajax_produto_crud.js" charset="utf-8"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <style>
            .bi-trash3-fill,
            bi-pen
            :hover{
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <input type="hidden" id="id_produto" value="<?php echo @$_GET['id_produto'];?>">
        <div class="container" style="margin-top:10px;">
            <?php include 'menu.php';?>
            <div class="form-group" style="margin-top:20px;">
                <label for="txt_produto">Produto</label>
                <input type="text" class="form-control" id="txt_produto" placeholder="Digite aqui o produto" required>
            </div>
            <br>
            <div class="form-group">
                <label for="txt_valor">Valor</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" id="txt_valor" placeholder="Digite aqui o seu e-mail" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" id="btn_enviar">Enviar</button>
            <nav class="navbar navbar-light bg-light" style="margin-top:20px;">
              <div class="form-group col-md-6">
                <input class="form-control " type="search" placeholder="Search" aria-label="Search" onkeyup="buscar()" id='busca'>
                </div>
                  <div class="form-group col-md-6">
                <button class="btn btn-outline-success " type="submit" >Search</button>
                </div>
            </nav>
            <div id="table"></div>
        </div>
    </body>
</html>