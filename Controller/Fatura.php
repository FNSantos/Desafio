<?php

    require_once("Model/Fatura.php");
    require_once("Model/FaturaDAO.php");

    session_start();

    class FaturaControl{

        public function inserir(){

            $fatura = new Fatura();
            $faturaDAO = new FaturaDAO();

            $fatura->setIdCliente($_POST["idCliente"]);
            $fatura->setValor($_POST["valor"]);
            $fatura->setDataVencimento($_POST["dataVencimento"]);

            $faturaDAO->inserir($fatura);


        }

        public function obterTodos(){
            
            $faturaDAO = new FaturaDAO();

            $listaFaturas = array();

            $listaFaturas = $faturaDAO->obterTodos();

            echo('<br><div class="row" style="font-weight:bold;">');
            echo('<div class="col">Cliente</div>');
            echo('<div class="col">Valor</div>');
            echo('<div class="col">Data de Vencimento</div>');
            echo('<div class="col">Opções</div>');
            echo('</div>');
            
            foreach ($listaFaturas as $fatura) {

                echo('<div class="row">');
                echo('<div class="col">'.$fatura->getIdCliente().'</div>');
                echo('<div class="col"> R$ '.number_format($fatura->getValor(),2,",",".").'</div>');
                echo('<div class="col">'.date("d/m/Y", strtotime($fatura->getDataVencimento())).'</div>');
                echo('<div class="col">
                        <i class="bi bi-trash3-fill" alt="Excluir" title="Excluir" onclick="remover('.$fatura->getId().')"></i>
                    </div>');
                echo('</div>');
            }

        }

        public function remover(){

            $faturaDAO = new FaturaDAO();
            
            $faturaDAO->remover($_POST["idFatura"]);

        }

    }

?>