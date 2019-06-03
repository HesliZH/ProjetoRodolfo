<?php

require_once '../DB/DBUsuario.Class.Php';

class Usuario extends DBUsuario{
    private $id;
    private $nome;
    private $usuario;
    private $senha;
    private $ativo;
    private $nivel;

    //Set
    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }
    public function setNivel($nivel){
        $this->nivel = $nivel;
    }

    //Get
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getAtivo(){
        return $this->ativo;
    }
    public function getNivel(){
        return $this->nivel;
    }

    //Metodos

    public function Validar(){
        return parent::DBValidar($this);
    }

    public function Listar(){
        return parent::DBListar();
    }

    public function Inserir(){
        return parent::DBInserir($this);
    }

    public function Buscar($id){
        return parent::DBBuscar($id);
    }

    public function Atualizar(){
        return parent::DBAtualizar($this);
    }

    public function Excluir($id){
        return parent::DBExcluir($id);
    }
}