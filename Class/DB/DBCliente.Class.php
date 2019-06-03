<?php
	require_once "DBConexao.Class.php";

	abstract class DBCliente extends DBConexao
	{	

        public static function DBInserir(Clientes $Cliente)
        {
            $conexao = parent::getDB();
    
            $query = pg_query($conexao, "INSERT INTO tblClientes (nome, cpf_cnpj, endereco, cep, telefone) VALUES ('".$Cliente->getNome()."', '".$Cliente->getCpf_cnpj()."', '".$Cliente->getEndereco()."', '".$Cliente->getCep()."', '".$Cliente->getTelefone()."')");
                
            if ($query)
            {
                return "Inserido com sucesso";
            }
            else
            {
                return "Erro ao inserir";
            }
        }
        
	public static function DBListar()
        {
            $conexao = parent::getDB();

            $query = pg_query($conexao, "SELECT id, nome, cpf_cnpj, endereco, cep, telefone FROM TBLClientes ORDER BY id");

            return pg_fetch_all($query);
        }

        //DBAtualizar
        public static function DBAtualizar(Clientes $Cliente)
        {
            $conexao = parent::getDB();

            $query = pg_query("UPDATE TBLClientes SET nome = '".$Cliente->getNome()."', cpf_cnpj = '".$Cliente->getCpf_cnpj()."', endereco = '".$Cliente->getEndereco()."', cep = '".$Cliente->getCep()."', telefone = '".$Cliente->getTelefone()."' WHERE id = ".$Cliente->getId());
            
            if ($query)
            {
                return "Alterado com sucesso";
            }
            else
            {
                return "Erro ao alterar";
            }
        }


        public static function DBBuscar($cod_cli)
        {
            $conexao = parent::getDB();

            $query = pg_query($conexao,"SELECT id, nome, cpf_cnpj, endereco, cep, telefone FROM TBLClientes
                                         WHERE id = '".$cod_cli."'");

            $dataSetCliente = pg_fetch_assoc($query);

            if($dataSetCliente) {
                $Cliente = new Clientes();
                $Cliente->setId($dataSetCliente["id"]);
                $Cliente->setNome($dataSetCliente["nome"]);
                $Cliente->setCpf_cnpj($dataSetCliente["cpf_cnpj"]);
                $Cliente->setEndereco($dataSetCliente["endereco"]);
                $Cliente->setCep($dataSetCliente["cep"]);
                $Cliente->setTelefone($dataSetCliente["telefone"]);
                
                return $Cliente;
            }

            return false;
        }

        
        public static function DBExcluir($cod_cli)
        {
            $conexao = parent::getDB();

            $query = pg_query($conexao, "DELETE FROM TBLClientes WHERE id = '".$cod_cli."'");

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
?>