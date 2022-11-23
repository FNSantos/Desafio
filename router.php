<?php

    switch ($_POST["classe"]) {

        case "produto":

            require_once("Controller/Produto.php");

            $produto = new ProdutoControl();

            switch ($_POST["acao"]) {

                case "inserir":

                    $produto->inserir();

                    break;

                case "obterTodos":

                    $produto->obterTodos();

                    break;
                    
                case "listaProdutos":

                    $produto->listaProdutos();

                    break;
                

                case "obterUm":

                    $produto->obterUm();

                    break;
                    
                case "buscar":

                    $produto->buscar();

                    break;

                case "atualizar":

                    $produto->atualizar();

                    break;

                case "remover":

                    $produto->remover();

                    break;

            }
            
            break;
            
         case "cliente":

            require_once("Controller/Cliente.php");

            $cliente = new ClienteControl();

            switch ($_POST["acao"]) {

                case "inserir":

                    $cliente->inserir();

                    break;

                case "obterTodos":

                    $cliente->obterTodos();

                    break;

                case "listaClientes":

                    $cliente->listaClientes();

                    break;
                    
                case "buscar":

                    $cliente->buscar();

                    break;

                case "obterUm":

                    $cliente->obterUm();

                    break;

                case "atualizar":

                    $cliente->atualizar();

                    break;

                case "remover":

                    $cliente->remover();

                    break;

            }

            break;

    }

 ?>