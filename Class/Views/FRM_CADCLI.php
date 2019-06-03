<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(empty($_SESSION["id"])){
        session_destroy();
        header("Location: ../../index.php");
        exit;
    }

    require_once "../Control/Clientes.Class.php";

    $cliente = new Clientes();
	
    if (isset($_POST["cadastrar"])){
        $cliente->setId($_POST["id"]);
        $cliente->setNome($_POST["nome"]);
        $cliente->setCpf_cnpj($_POST["cpf_cnpj"]);
        $cliente->setEndereco($_POST["endereco"]);
        $cliente->setCep($_POST["cep"]);
        $cliente->setTelefone($_POST["telefone"]);
        
        if ($cliente->inserir() == "Inserido com sucesso"){
            header("Location: FRM_CADCLI.php");
        } else {
            echo '<script type="text/javascript">alert("Erro ao inserir");</script>';
        }
    }

    if (isset($_GET["acao"])){
        switch ($_GET["acao"]){
            case "editar":
                $cliente_busca = $cliente->buscar($_GET["id"]);
                break;
            case "excluir": 
                if ($cliente->excluir($_GET["id"]) == "Excluído com sucesso"){
                    header("Location: FRM_CADCLI.php");
                } else {
                    echo '<script type="text/javascript">alert("Erro ao deletar");</script>';
                }
                break;
        }
    }

    
    if(isset($_POST["alterar"])){
        $cliente->setId($_POST["id"]);
        $cliente->setNome($_POST["nome"]);
        $cliente->setCpf_cnpj($_POST["cpf_cnpj"]);
        $cliente->setEndereco($_POST["endereco"]);
        $cliente->setCep($_POST["cep"]);
        $cliente->setTelefone($_POST["telefone"]);

        if($cliente->atualizar() == "Alterado com sucesso"){
            header("Location: FRM_CADCLI.php");
        }else{
            echo '<script type="text/javascript">alert("Erro em alterar");</script>';
        }
    }

?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Cadastro de Clientes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<meta name="author" content="INF5N">
		<meta name="description" content="Sistemas de Informação Manda">
	</head>
	<body>
		<form action="" method="POST" align="Center">
            <div> Código </div>
            <input type="text" name="id"
                value="<?=(isset($cliente_busca))?($cliente_busca->getId()):("")?>"
                readonly>

            <div>Nome</div>
            <input type="text" name="nome"
                value="<?=(isset($cliente_busca))?($cliente_busca->getNome()):("")?>"
                required>

            <div>CPF CNPJ</div>
            <input type="text" name="cpf_cnpj"
                value="<?=(isset($cliente_busca))?($cliente_busca->getCpf_cnpj()):("")?>"
                required>

            <div>Endereço</div>
            <input type="text" name="endereco"
                value="<?=(isset($cliente_busca))?($cliente_busca->getEndereco()):("")?>"
                required>

            <div>CEP</div>
            <input type="text" name="cep"
                value="<?=(isset($cliente_busca))?($cliente_busca->getCep()):("")?>"
                required>

            <div>Telefone</div>
            <input type="text" name="telefone"
                value="<?=(isset($cliente_busca))?($cliente_busca->getTelefone()):("")?>"
                required>

            <div></div>
            <br>
			<input type="submit"
                name="<?=(isset($_GET["acao"]) == "editar")?("alterar"):("cadastrar")?>"
                value="<?=(isset($_GET["acao"]) == "editar")?("Alterar"):("Cadastrar")?>"
                class="btn btn-danger"
            >
		</form>

        <div align="Center">
        <table border="1" class="table">
            <tr>
                <td>CÓDIGO</td>
                <td>NOME</td>
                <td>CPF CNPJ</td>
                <td>ENDEREÇO</td>
                <td>CEP</td>
                <td>TELEFONE</td>
                <td>OPÇÕES</td>
                <td>OPÇÕES</td>
            </tr>
            <?php foreach((array)$cliente->listar() as $item){ ?>
                <tr>
                    <td><?=$item["id"]?></td>
                    <td><?=$item["nome"]?></td>
                    <td><?=$item["cpf_cnpj"]?></td>
                    <td><?=$item["endereco"]?></td>
                    <td><?=$item["cep"]?></td>
                    <td><?=$item["telefone"]?></td>
                    <td>
                        <a class="btn btn-danger" href="?acao=editar&id=<?=$item["id"]?>" title="Editar">Editar</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="?acao=excluir&id=<?=$item["id"]?>"
                            title="Excluir"
                            onclick="return confirm('Tem certeza que deseja deletar esse registro?');">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        </div>
	</body>
</html>