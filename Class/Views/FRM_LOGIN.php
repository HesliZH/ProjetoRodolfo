<!DOCTYPE html>
<html>
    <head>
        <title>Tela de login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    
    <link href="Include/CSS/signin.css" rel="stylesheet">
  </head>
    <body class="text-center">
         <form class="form-signin" ACTION="Class/Views/TRG_VALIDA.php" method="POST">
              <img class="mb-4" src="Img/logo.jpg" alt="" width="72" height="72">
              <h1 class="h3 mb-3 font-weight-normal">Por favor logue no sistema</h1>
              <label for="inputEmail" class="sr-only">Usuário</label>
              <input type="text" name="usuario" class="form-control" placeholder="Digite seu usuario" required autofocus>
              <label for="inputPassword" class="sr-only">Senha</label>
              <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required>
        <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Lembre de mim :D
            </label>
        </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
              <p class="mt-5 mb-3 text-muted">&copy; 2019 - HitKill Software</p>
        </form>
    </body>
</html>