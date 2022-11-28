<?php

    require_once("ConexaoBanco.php");
    require_once("Fatura.php");

    class FaturaDAO{

        public function inserir(Fatura $fatura){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO fatura(VALOR, ID_CLIENTE, DATA, DATA_VENCIMENTO) VALUES(?, ?, ?, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $fatura->getValor());
            $stm->bindValue(2, $fatura->getIdCliente());
            $stm->bindValue(3, date("Y-m-d"));
            $stm->bindValue(4, $fatura->getDataVencimento());
            
            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return True;

            } else {

                return False;

            }


        }

        public function obterTodos(){

            $conexao = ConexaoBanco::obterConexao();

            $listaFaturas = array();

            $SQL = "SELECT f.*, c.NOME FROM fatura as f INNER JOIN cliente AS c ON f.id_cliente = c.id;";
            
            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $fatura = new Fatura();
                
                $fatura->setId($resultSet["ID"]);
                $fatura->setIdCliente($resultSet["NOME"]);
                $fatura->setDataVencimento($resultSet["DATA_VENCIMENTO"]);
                $fatura->setValor($resultSet["VALOR"]);

                $listaFaturas[] = $fatura;

            }

            $conexao = null;

            return $listaFaturas;

        }

        public function remover($idFatura){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "DELETE FROM fatura WHERE ID = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $idFatura);

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }      

    }

 ?>