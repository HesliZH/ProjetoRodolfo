<?php
    require_once '../DB/DBCliente.Class.php';

    class Clientes extends DBCliente {
        private $id;
        private $nome;
        private $cpf_cnpj;
        private $endereco;
        private $cep;
        private $telefone;
        
        function getId() {
            return $this->id;
        }

        function getNome() {
            return $this->nome;
        }

        function getCpf_cnpj() {
            return $this->cpf_cnpj;
        }

        function getEndereco() {
            return $this->endereco;
        }

        function getCep() {
            return $this->cep;
        }

        function getTelefone() {
            return $this->telefone;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setCpf_cnpj($cpf_cnpj) {
            $this->cpf_cnpj = $cpf_cnpj;
        }

        function setEndereco($endereco) {
            $this->endereco = $endereco;
        }

        function setCep($cep) {
            $this->cep = $cep;
        }

        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
        public function Inserir(){
            return parent::DBInserir($this);
        }
        
        public function Excluir($id){
            return parent::DBExcluir($id);
        }
        
        public function Listar(){
            return parent::DBListar();
        }
        
        public function Atualizar(){
            return parent::DBAtualizar($this);
        }
        
        public function Buscar($id){
            return parent::DBBuscar($id);
        }

    }
