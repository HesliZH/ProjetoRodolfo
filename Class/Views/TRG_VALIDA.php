<?php

    require_once '../Control/Usuario.Class.Php';

    //Senão existe uma sessão cria uma. Colocar em todos os arquivos
    if(!isset($_SESSION)){
        session_start();
    }

    if(!empty($_POST) and (empty($_POST['usuario'])) or empty($_POST['senha'])){
        header("Location: ../../index.php");
        exit;
    }

    $usuario = new Usuario();
    $usuario->setUsuario($_POST['usuario']);
    $usuario->setSenha($_POST['senha']);

    $user = $usuario->Validar();
    
    //Se o usuário for autenticado vai para a pagina
    if($user){
        $_SESSION["id"] = $user->getId();
        $_SESSION["nome"] = $user->getNome();
        $_SESSION["nivel"] = $user->getNivel();
        header("Location: MAIN.php");
        exit;
    }else{//Senão volta para a página inicial
        header("Location: ../../index.php");
        exit;
    }

