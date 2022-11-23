<?php

    require_once("ConexaoBanco.php");
    require_once("Produto.php");

    class ProdutoDAO{

        public function inserir(Produto $produto){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO produto(PRODUTO, VALOR) VALUES(?, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $produto->getProduto());
            $stm->bindValue(2, $produto->getValor());
            
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

            $listaProdutos = array();

            $SQL = "SELECT * FROM produto;";
            
            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $produto = new Produto();
                
                $produto->setId($resultSet["ID"]);
                $produto->setProduto($resultSet["PRODUTO"]);
                $produto->setValor($resultSet["VALOR"]);

                $listaProdutos[] = $produto;

            }

            $conexao = null;

            return $listaProdutos;

        }

        public function obterUm($idProduto){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM produto WHERE ID = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $idProduto);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();

            $conexao = null;

            return $resultSet;

        }

        public function atualizar(Produto $produto){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE produto SET PRODUTO = ?, VALOR = ? WHERE ID = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $produto->getProduto());
            $stm->bindValue(2, $produto->getValor());
            
            $stm->bindValue(3, $produto->getId());

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }
        
         public function buscar($busca){

            $conexao = ConexaoBanco::obterConexao();

            $listaProdutos = array();

            $SQL = "SELECT * FROM produto WHERE PRODUTO LIKE ?;";
            
            $stm = $conexao->prepare($SQL);
            
            $term = '%'.$busca.'%';
            
            $stm->bindParam(1, $term);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $produto = new Produto();
    
                $produto->setId($resultSet["ID"]);
                $produto->setProduto($resultSet["PRODUTO"]);
                $produto->setValor($resultSet["VALOR"]);

                $listaProdutos[] = $produto;

            }

            $conexao = null;

            return $listaProdutos;

        }

        public function remover($idProduto){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "DELETE FROM produto WHERE ID = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $idProduto);

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