<?php

    class Fatura{

        private $id;
        private $idCliente;
        private $valor;
        private $data;
        private $dataVencimento;
        
        public function setId($id){

            $this->id = $id;

        }

        public function getId(){

            return $this->id;

        }

        public function setIdCliente($idCliente){

            $this->idCliente = $idCliente;

        }

        public function getIdCliente(){

            return $this->idCliente;

        }

        public function setValor($valor){

            $this->valor = $valor;

        }

        public function getValor(){

            return $this->valor;

        }

        public function setData($data){

            $this->data = $data;

        }

        public function getData(){

            return $this->data;

        }

        
        public function setDataVencimento($dataVencimento){

            $this->dataVencimento = $dataVencimento;

        }

        public function getDataVencimento(){

            return $this->dataVencimento;

        }

    }

 ?> 