<?php

    class Cliente{

        private $id;
        private $nome;
        private $email;

        public function setId($id){

            $this->id = $id;

        }

        public function getId(){

            return $this->id;

        }

        public function setNome($nome){

            $this->nome = $nome;

        }

        public function getNome(){

            return $this->nome;

        }

        
        public function setEmail($email){

            $this->email = $email;

        }

        public function getEmail(){

            return $this->email;

        }

    }

 ?> 