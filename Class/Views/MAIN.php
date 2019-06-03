<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(empty($_SESSION["id"])){
        session_destroy();
        header("Location: ../../index.php");
        exit;
    }
    
?>


<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Menu principal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <header>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Módulos do sistema</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        
        <!--Apenas botão do cadastro de clientes-->
        <?php
            if($_SESSION['nivel'] == 1){
                echo '<li class="nav-item active">
                        <a class="nav-link" href="FRM_CADCLI.PHP">Cadastro de clientes <span class="sr-only">(current)</span></a>
                      </li>';
            }elseif($_SESSION['nivel'] == 2){
                echo '<li class="nav-item active">
                        <a class="nav-link" href="FRM_CADCLI.PHP">Cadastro de clientes <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="FRM_CADPRO.PHP">Cadastro de produtos <span class="sr-only">(current)</span></a>
                      </li>';
            }else{
                echo '<li class="nav-item active">
                        <a class="nav-link" href="FRM_CADCLI.PHP">Cadastro de clientes <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="FRM_CADPRO.PHP">Cadastro de produtos <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="FRM_CADUSU.PHP">Cadastro de usuários <span class="sr-only">(current)</span></a>
                      </li>';
            }
          ?>
        
      </ul>
      <form class="form-inline mt-2 mt-md-0" action="TRG_LOGOUT.php">
        <!--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">-->
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sair</button>
      </form>
    </div>
  </nav>
</header>
<br>
<br>
<main role="main" class="flex-shrink-0">
  <div class="container">
    <?php
        echo '<h1 class="mt-5">Bem vindo querido usuário chamado '.$_SESSION['nome'].' </h1>'; 
        echo '<p class="lead">Seja bem vindo ao sistema de cadastro de clientes e produtos!</p>';
    ?>
  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Sistema elaborado pelo academico de Sistemas de Informação Hesli Hendrik Azevedo.</span>
  </div>
</footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
</html>
