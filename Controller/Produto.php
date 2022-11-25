<?php

    require_once("Model/Produto.php");
    require_once("Model/ProdutoDAO.php");

    session_start();

    class ProdutoControl{

        public function inserir(){

            $produto = new Produto();
            $produtoDAO = new ProdutoDAO();

            $produto->setProduto($_POST["produto"]);
            $produto->setValor($_POST["valor"]);

            $produtoDAO->inserir($produto);


        }

        public function atualizar(){
            $produto = new Produto();
            $produtoDAO = new ProdutoDAO();

            $produto->setId($_POST["idProduto"]);
            $produto->setProduto($_POST["produto"]);
            $produto->setValor($_POST["valor"]);

            $produtoDAO->atualizar($produto);


        }
        public function obterTodos(){
            
            $produtoDAO = new ProdutoDAO();

            $listaProdutos = array();

            $listaProdutos = $produtoDAO->obterTodos();

            echo('<br><div class="row" style="font-weight:bold;">');
            echo('<div class="col">Produto</div>');
            echo('<div class="col">Valor</div>');
            echo('<div class="col">Opções</div>');
            echo('</div>');
            
            foreach ($listaProdutos as $produto) {

                echo('<div class="row">');
                echo('<div class="col">'.$produto->getProduto().'</div>');
                echo('<div class="col">'.$produto->getValor().'</div>');
                echo('<div class="col">
                        <i class="bi bi-trash3-fill" alt="Excluir" title="Excluir" onclick="remover('.$produto->getId().')"></i>
                        <a class="bi bi-pen" alt="Editar" title="Editar" href="cadastro_produto.php?id_produto='.$produto->getId().'"></a>
                    </div>');
                echo('</div>');
            }

        }
        
        public function listaProdutos(){

            $produtoDAO = new ProdutoDAO();

            $listaProdutos = array();

            $listaProdutos = $produtoDAO->obterTodos();
            
            foreach ($listaProdutos as $produto) {
                $lista[] = array('id' => $produto->getId(), 
                                 'produto' => $produto->getProduto(),
                                 'valor' => $produto->getValor());
            }

            echo(json_encode($lista));

        }
        
        public function buscar(){

            $produtoDAO = new ProdutoDAO();

            $listaProdutos = $produtoDAO->buscar($_POST["busca"]);
            
            
            echo('<br><div class="row" style="font-weight:bold;">');
            echo('<div class="col">Nome</div>');
            echo('<div class="col">Email</div>');
            echo('<div class="col">Opções</div>');
            echo('</div>');
            
            foreach ($listaProdutos as $produto) {

                echo('<div class="row">');
                echo('<div class="col">'.$produto->getProduto().'</div>');
                echo('<div class="col">'.$produto->getValor().'</div>');
                echo('<div class="col">
                        <i class="bi bi-trash3-fill" alt="Excluir" title="Excluir" onclick="remover('.$produto->getId().')"></i>
                        <a class="bi bi-pen" alt="Editar" title="Editar" href="cadastro_produto.php?id_produto='.$produto->getId().'"></a>
                    </div>');
                echo('</div>');
                
            }

        }

        public function obterUm(){

            $produtoDAO = new ProdutoDAO();

            echo(json_encode($produtoDAO->obterUm($_POST["id"])));

        }

        public function remover(){

            $produtoDAO = new ProdutoDAO();
            
            $produtoDAO->remover($_POST["idProduto"]);

        }

    }

?>