<?php

    require_once("ConexaoBanco.php");
    require_once("Cliente.php");

    class ClienteDAO{

        public function inserir(Cliente $cliente){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO cliente (NOME, EMAIL) VALUES(?, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $cliente->getNome());
            $stm->bindValue(2, $cliente->getEmail());
            
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

            $listaClientes = array();

            $SQL = "SELECT * FROM cliente;";
            
            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $cliente = new Cliente();
                
                $cliente->setId($resultSet["ID"]);
                $cliente->setNome($resultSet["NOME"]);
                $cliente->setEmail($resultSet["EMAIL"]);

                $listaClientes[] = $cliente;

            }

            $conexao = null;

            return $listaClientes;

        }
        
        public function buscar($busca){

            $conexao = ConexaoBanco::obterConexao();

            $listaClientes = array();

            $SQL = "SELECT * FROM cliente WHERE NOME LIKE ?;";
            
            $stm = $conexao->prepare($SQL);
            
            $term = '%'.$busca.'%';
            
            $stm->bindParam(1, $term);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $cliente = new Cliente();
    
                $cliente->setId($resultSet["ID"]);
                $cliente->setNome($resultSet["NOME"]);
                $cliente->setEmail($resultSet["EMAIL"]);

                $listaClientes[] = $cliente;

            }

            $conexao = null;

            return $listaClientes;

        }

        public function obterUm($idCliente){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM cliente WHERE ID = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $idCliente);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();

            $conexao = null;

            return $resultSet;

        }

        public function atualizar(Cliente $cliente){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE cliente SET NOME = ?, EMAIL = ? WHERE ID = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $cliente->getNome());
            $stm->bindValue(2, $cliente->getEmail());
            
            $stm->bindValue(3, $cliente->getId());

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function remover($idCliente){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "DELETE FROM cliente WHERE ID = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $idCliente);

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