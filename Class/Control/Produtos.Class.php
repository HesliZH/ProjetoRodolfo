<?php
    require_once '../DB/DBProdutos.Class.php';

    class Produtos extends DBProdutos{
        private $id;
        private $descricao;
        private $custo_real;
        private $preco_venda;
        private $qtd_estoque;
        private $unidade;


        //Get
        function getId() {
            return $this->id;
        }

        function getDescricao() {
            return $this->descricao;
        }

        function getCusto_real() {
            return $this->custo_real;
        }

        function getPreco_venda() {
            return $this->preco_venda;
        }

        function getQtd_estoque() {
            return $this->qtd_estoque;
        }

        function getUnidade() {
            return $this->unidade;
        }

        //Set

        function setId($id) {
            $this->id = $id;
        }

        function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        function setCusto_real($custo_real) {
            $this->custo_real = $custo_real;
        }

        function setPreco_venda($preco_venda) {
            $this->preco_venda = $preco_venda;
        }

        function setQtd_estoque($qtd_estoque) {
            $this->qtd_estoque = $qtd_estoque;
        }

        function setUnidade($unidade) {
            $this->unidade = $unidade;
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
