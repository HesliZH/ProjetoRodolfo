<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(empty($_SESSION["id"])){
        session_destroy();
        header("Location: ../../index.php");
        exit;
    }
    require_once "../Control/Produtos.Class.php";

    $produto = new Produtos();
	
    if (isset($_POST["cadastrar"])){
        $produto->setId($_POST["id"]);
        $produto->setDescricao($_POST["descricao"]);
        $produto->setCusto_real($_POST["custo_real"]);
        $produto->setPreco_venda($_POST["preco_venda"]);
        $produto->setQtd_estoque($_POST["qtd_estoque"]);
        $produto->setUNidade($_POST["unidade"]);

        if ($produto->inserir() == "Inserido com sucesso"){
            header("Location: FRM_CADPRO.php");
        } else {
            echo '<script type="text/javascript">alert("Erro ao inserir");</script>';
        }
    }

    if (isset($_GET["acao"])){
        switch ($_GET["acao"]){
            case "editar":
                $produto_busca = $produto->buscar($_GET["id"]);
                break;
            case "excluir": 
                if ($produto->excluir($_GET["id"]) == "Excluído com sucesso"){
                    header("Location: FRM_CADPRO.php");
                } else {
                    echo '<script type="text/javascript">alert("Erro ao deletar");</script>';
                }
                break;
        }
    }
    if(isset($_POST["alterar"])){
        $produto->setId($_POST["id"]);
        $produto->setDescricao($_POST["descricao"]);
        $produto->setCusto_real($_POST["custo_real"]);
        $produto->setPreco_venda($_POST["preco_venda"]);
        $produto->setQtd_estoque($_POST["qtd_estoque"]);
        $produto->setUNidade($_POST["unidade"]);

        if($produto->atualizar() == "Alterado com sucesso"){
            header("Location: FRM_CADPRO.php");
        }else{
            echo '<script type="text/javascript">alert("Erro em alterar");</script>';
        }
    }

?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Cadastro de Produtos</title>
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
                value="<?=(isset($produto_busca))?($produto_busca->getId()):("")?>"
                readonly>

            <div>Descrição</div>
            <input type="text" name="descricao"
                value="<?=(isset($produto_busca))?($produto_busca->getDescricao()):("")?>"
                required>

            <div>Custo Real</div>
            <input type="text" name="custo_real"
                value="<?=(isset($produto_busca))?($produto_busca->getCusto_real()):("")?>"
                required>
            
            <div>Preço venda</div>
            <input type="text" name="preco_venda"
                value="<?=(isset($produto_busca))?($produto_busca->getPreco_venda()):("")?>"
                required>

            <div>Quantidade em Estoque</div>
            <input type="text" name="qtd_estoque"
                value="<?=(isset($produto_busca))?($produto_busca->getQtd_estoque()):("")?>"
                required>

            <div>Unidade de medida</div>
            <input type="text" name="unidade"
                value="<?=(isset($produto_busca))?($produto_busca->getUnidade()):("")?>"
                required>

            <div></div>
            <br>
			<input type="submit"
                name="<?=(isset($_GET["acao"]) == "editar")?("alterar"):("cadastrar")?>"
                value="<?=(isset($_GET["acao"]) == "editar")?("Alterar"):("Cadastrar")?>"
                class="btn btn-danger"
            >
		</form>

        <div>
        <table border="1" align="Center" class="table">
            <tr>
                <td>CÓDIGO</td>
                <td>DESCRIÇÃO</td>
                <td>CUSTO REAL</td>
                <td>PREÇO VENDA</td>
                <td>QUANTIDADE EM ESTOQUE</td>
                <td>UNIDADE DE MEDIDA</td>
                <td>OPÇÕES</td>
                <td>OPÇÕES</td>
            </tr>
            <?php foreach((array)$produto->listar() as $item){ ?>
                <tr>
                    <td><?=$item["id"]?></td>
                    <td><?=$item["descricao"]?></td>
                    <td><?=$item["custo_real"]?></td>
                    <td><?=$item["preco_venda"]?></td>
                    <td><?=$item["qtd_estoque"]?></td>
                    <td><?=$item["unidade"]?></td>
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