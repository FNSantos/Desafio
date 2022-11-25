<?php

    require_once("Model/Fatura.php");
    require_once("Model/Fatura.php");

    session_start();

    class FaturaControl{

        public function inserir(){

            $fatura = new Fatura();
            $faturaDAO = new FaturaDAO();

            $fatura->setFatura($_POST["produto"]);
            $fatura->setValor($_POST["valor"]);

            $faturaDAO->inserir($fatura);


        }

        public function atualizar(){
            $fatura = new Fatura();
            $faturaDAO = new FaturaDAO();

            $fatura->setId($_POST["idFatura"]);
            $fatura->setFatura($_POST["produto"]);
            $fatura->setValor($_POST["valor"]);

            $faturaDAO->atualizar($fatura);


        }
        public function obterTodos(){
            
            $faturaDAO = new FaturaDAO();

            $listaFaturas = array();

            $listaFaturas = $faturaDAO->obterTodos();

            echo('<br><div class="row" style="font-weight:bold;">');
            echo('<div class="col">Fatura</div>');
            echo('<div class="col">Valor</div>');
            echo('<div class="col">Opções</div>');
            echo('</div>');
            
            foreach ($listaFaturas as $fatura) {

                echo('<div class="row">');
                echo('<div class="col">'.$fatura->getFatura().'</div>');
                echo('<div class="col">'.$fatura->getValor().'</div>');
                echo('<div class="col">
                        <i class="bi bi-trash3-fill" alt="Excluir" title="Excluir" onclick="remover('.$fatura->getId().')"></i>
                        <a class="bi bi-pen" alt="Editar" title="Editar" href="cadastro_produto.php?id_produto='.$fatura->getId().'"></a>
                    </div>');
                echo('</div>');
            }

        }
        
        public function listaFaturas(){

            $faturaDAO = new FaturaDAO();

            $listaFaturas = array();

            $listaFaturas = $faturaDAO->obterTodos();
            
            foreach ($listaFaturas as $fatura) {
                $lista[] = array('id' => $fatura->getId(), 
                                 'produto' => $fatura->getFatura());
            }

            echo(json_encode($lista));

        }
        
        public function buscar(){

            $faturaDAO = new FaturaDAO();

            $listaFaturas = $faturaDAO->buscar($_POST["busca"]);
            
            
            echo('<br><div class="row" style="font-weight:bold;">');
            echo('<div class="col">Nome</div>');
            echo('<div class="col">Email</div>');
            echo('<div class="col">Opções</div>');
            echo('</div>');
            
            foreach ($listaFaturas as $fatura) {

                echo('<div class="row">');
                echo('<div class="col">'.$fatura->getFatura().'</div>');
                echo('<div class="col">'.$fatura->getValor().'</div>');
                echo('<div class="col">
                        <i class="bi bi-trash3-fill" alt="Excluir" title="Excluir" onclick="remover('.$fatura->getId().')"></i>
                        <a class="bi bi-pen" alt="Editar" title="Editar" href="cadastro_produto.php?id_produto='.$fatura->getId().'"></a>
                    </div>');
                echo('</div>');
                
            }

        }

        public function obterUm(){

            $faturaDAO = new FaturaDAO();

            echo(json_encode($faturaDAO->obterUm($_POST["id"])));

        }

        public function remover(){

            $faturaDAO = new FaturaDAO();
            
            $faturaDAO->remover($_POST["idFatura"]);

        }

    }

?>