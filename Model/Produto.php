<?php

    class Produto{

        private $id;
        private $produto;
        private $valor;

        public function setId($id){

            $this->id = $id;

        }

        public function getId(){

            return $this->id;

        }

        public function setProduto($produto){

            $this->produto = $produto;

        }

        public function getProduto(){

            return $this->produto;

        }

        public function setValor($valor){

            $this->valor = $valor;

        }

        public function getValor(){

            return $this->valor;

        }

    }

 ?> 