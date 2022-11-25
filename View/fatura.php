<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fatura</title>
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
        <input type="hidden" id="id_fatura" value="<?php echo @$_GET['id_produto'];?>">
        <div class="container" style="margin-top:10px;">
            <?php include 'menu.php';?>
            
        </div>
    </body>
</html>