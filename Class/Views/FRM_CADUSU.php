<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(empty($_SESSION["id"])){
        session_destroy();
        header("Location: ../../index.php");
        exit;
    }
    require_once "../Control/Usuario.Class.php";

    $usuario = new Usuario();
	
    if (isset($_POST["cadastrar"])){
        $usuario->setId($_POST["id"]);
        $usuario->setNome($_POST["nome"]);
        $usuario->setUsuario($_POST["usuario"]);
        $usuario->setSenha($_POST["senha"]);
        $usuario->setNivel($_POST["nivel"]);

        if ($usuario->inserir() == "Inserido com sucesso"){
            header("Location: FRM_CADUSU.php");
        } else {
            echo '<script type="text/javascript">alert("Erro ao inserir");</script>';
        }
    }

    if (isset($_GET["acao"])){
        switch ($_GET["acao"]){
            case "editar":
                $usuario_busca = $usuario->buscar($_GET["id"]);
                break;
            case "excluir": 
                if ($usuario->excluir($_GET["id"]) == "Excluído com sucesso"){
                    header("Location: FRM_CADUSU.php");
                } else {
                    echo '<script type="text/javascript">alert("Erro ao deletar");</script>';
                }
                break;
        }
    }
    if(isset($_POST["alterar"])){
        $usuario->setId($_POST["id"]);
        $usuario->setNome($_POST["nome"]);
        $usuario->setUsuario($_POST["usuario"]);
        $usuario->setSenha($_POST["senha"]);
        $usuario->setNivel($_POST["nivel"]);;

        if($usuario->atualizar() == "Alterado com sucesso"){
            header("Location: FRM_CADUSU.php");
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
                value="<?=(isset($usuario_busca))?($usuario_busca->getId()):("")?>"
                readonly>

            <div>Nome</div>
            <input type="text" name="nome"
                value="<?=(isset($usuario_busca))?($usuario_busca->getNome()):("")?>"
                required>

            <div>Usuario</div>
            <input type="text" name="usuario"
                value="<?=(isset($usuario_busca))?($usuario_busca->getUsuario()):("")?>"
                required>
            
            <div>Senha</div>
            <input type="password" name="senha"
                value="<?=(isset($usuario_busca))?($usuario_busca->getSenha()):("")?>"
                required>

            <div>Nível de acesso</div>
            <input type="text" name="nivel"
                value="<?=(isset($usuario_busca))?($usuario_busca->getNivel()):("")?>"
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
                <td>NOME</td>
                <td>USUARIO</td>
                <td>ATIVO</td>
                <td>NIVEL</td>
                <td>OPÇÕES</td>
                <td>OPÇÕES</td>
            </tr>
            <?php foreach((array)$usuario->listar() as $item){ ?>
                <tr>
                    <td><?=$item["id"]?></td>
                    <td><?=$item["nome"]?></td>
                    <td><?=$item["usuario"]?></td>
                    <td><?=$item["ativo"]?></td>
                    <td><?=$item["nivel"]?></td>
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