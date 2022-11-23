<?php

    require_once("Model/Cliente.php");
    require_once("Model/ClienteDAO.php");

    session_start();

    class ClienteControl{

        public function inserir(){

            $cliente = new Cliente();
            $clienteDAO = new ClienteDAO();

            $cliente->setNome($_POST["nome"]);
            $cliente->setEmail($_POST["email"]);

            $clienteDAO->inserir($cliente);


        }

        public function atualizar(){
            $cliente = new Cliente();
            $clienteDAO = new ClienteDAO();

            $cliente->setId($_POST["idCliente"]);
            $cliente->setNome($_POST["nome"]);
            $cliente->setEmail($_POST["email"]);
            
            $clienteDAO->atualizar($cliente);


        }
        public function obterTodos(){
            
            $clienteDAO = new ClienteDAO();

            $listaClientes = array();

            $listaClientes = $clienteDAO->obterTodos();

            echo('<br><div class="row" style="font-weight:bold;">');
            echo('<div class="col">Nome</div>');
            echo('<div class="col">Email</div>');
            echo('<div class="col">Opções</div>');
            echo('</div>');
            
            foreach ($listaClientes as $cliente) {

                echo('<div class="row">');
                echo('<div class="col">'.$cliente->getNome().'</div>');
                echo('<div class="col">'.$cliente->getEmail().'</div>');
                echo('<div class="col">
                        <i class="bi bi-trash3-fill" alt="Excluir" title="Excluir" onclick="remover('.$cliente->getId().')"></i>
                        <a class="bi bi-pen" alt="Editar" title="Editar" href="cadastro_cliente.php?id_cliente='.$cliente->getId().'"></a>
                    </div>');
                echo('</div>');
            }

        }

        public function listaClientes(){

            $clienteDAO = new ClienteDAO();

            $listaClientes = array();

            $listaClientes = $clienteDAO->obterTodos();
            
            foreach ($listaClientes as $cliente) {
                $lista[] = array('id' => $cliente->getId(), 
                                 'nome' => $cliente->getNome());
            }

            echo(json_encode($lista));

        }

        public function obterUm(){

            $clienteDAO = new ClienteDAO();

            echo(json_encode($clienteDAO->obterUm($_POST["id"])));

        }
        
        public function buscar(){

            $clienteDAO = new ClienteDAO();

            $listaClientes = $clienteDAO->buscar($_POST["busca"]);
            
            
            echo('<br><div class="row" style="font-weight:bold;">');
            echo('<div class="col">Nome</div>');
            echo('<div class="col">Email</div>');
            echo('<div class="col">Opções</div>');
            echo('</div>');
            
            foreach ($listaClientes as $cliente) {

                echo('<div class="row">');
                echo('<div class="col">'.$cliente->getNome().'</div>');
                echo('<div class="col">'.$cliente->getEmail().'</div>');
                echo('<div class="col">
                        <i class="bi bi-trash3-fill" alt="Excluir" title="Excluir" onclick="remover('.$cliente->getId().')"></i>
                        <a class="bi bi-pen" alt="Editar" title="Editar" href="cadastro_cliente.php?id_cliente='.$cliente->getId().'"></a>
                    </div>');
                echo('</div>');
                
            }

        }

        public function remover(){

            $clienteDAO = new ClienteDAO();
            
            $clienteDAO->remover($_POST["idCliente"]);

        }

    }

?>