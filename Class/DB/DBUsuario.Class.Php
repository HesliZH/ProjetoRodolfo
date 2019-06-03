<?php

require_once 'DBConexao.Class.Php';

abstract class DBUsuario extends DBConexao{
    public static function DBValidar(Usuario $usuario){
        $conexao = parent::getDB();

        $query = pg_query($conexao, "SELECT ID, NOME, USUARIO, SENHA, ATIVO, NIVEL
        FROM TBLUSUARIO WHERE USUARIO = '".$usuario->getUsuario()."'
        AND SENHA = '".$usuario->getSenha()."'
        AND ATIVO = 1");

        $dataset = pg_fetch_assoc($query);

        if($dataset){
            $user = new Usuario();
            $user->setId($dataset['id']);
            $user->setNome($dataset['nome']);
            $user->setUsuario($dataset['usuario']);
            $user->setSenha($dataset['senha']);
            $user->setAtivo($dataset['ativo']);
            $user->setNivel($dataset['nivel']);

            return $user;
        }

        return false;
    }

    public static function DBInserir(Usuario $usuarios){
        $conexao = parent::getDB();

        $query = pg_query($conexao, "INSERT INTO tblusuario (nome, senha, nivel, usuario) VALUES ('".$usuarios->getNome()."', '".$usuarios->getSenha()."', '".$usuarios->getNivel()."', '".$usuarios->getUsuario()."')");
            
        if ($query)
        {
            return "Inserido com sucesso";
        }
        else
        {
            return "Erro ao inserir";
        }
    }
    
    public static function DBListar(){
        $conexao = parent::getDB();

        $query = pg_query($conexao, "SELECT id, nome, usuario, ativo, nivel FROM tblusuario ORDER BY id");

        return pg_fetch_all($query);
    }

    public static function DBAtualizar(Usuario $usuarios){
        $conexao = parent::getDB();

        $query = pg_query("UPDATE tblusuario SET nome = '".$usuarios->getNome()."', usuario = '".$usuarios->getUsuario()."', senha = '".$usuarios->getSenha()."', nivel = '".$usuarios->getNivel()."' WHERE id = ".$usuarios->getId());
        
        if ($query)
        {
            return "Alterado com sucesso";
        }
        else
        {
            return "Erro ao alterar";
        }
    }

    public static function DBBuscar($cod_usu){
        $conexao = parent::getDB();

        $query = pg_query($conexao,"SELECT id, nome, usuario, senha, ativo, nivel FROM tblusuario WHERE id = ".$cod_usu);

        $datasetUsuarios = pg_fetch_assoc($query);

        if($datasetUsuarios) {
            $usuarios = new Usuario();
            $usuarios->setId($datasetUsuarios["id"]);
            $usuarios->setNome($datasetUsuarios["nome"]);
            $usuarios->setUsuario($datasetUsuarios["usuario"]);
            $usuarios->setSenha($datasetUsuarios["senha"]);
            $usuarios->setAtivo($datasetUsuarios["ativo"]);
            $usuarios->setNivel($datasetUsuarios["nivel"]);

            return $usuarios;
        }

        return false;
    }

    public static function DBExcluir($cod_usu){
        $conexao = parent::getDB();

        $query = pg_query($conexao, "DELETE FROM tblusuario WHERE id = '".$cod_usu."'");

        if ($query)
        {
            return "Excluído com sucesso";
        }
        else
        {
            return "Erro ao excluir";
        }
    }
}