<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div id="fullBg" />

  <div class="title">
    <h1 class="form-signin-heading"> Sistema de Acompanhamento de Estagiários </h1>
  </div>

<div class="container">
  <form class="form-signin" action="Logar.php" method="post">

      <h1 class="form-signin-heading"> Faça o Login </h1>
      <input type="text" class="form-control" name="login" placeholder="Login" required="" autofocus="" />
      <input type="password" class="form-control" name="senha" placeholder="Password" required=""/>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>

      <h4 class="form-signin-heading">
        <?php session_start(); if (!empty($_SESSION['msg'])){ echo  $_SESSION['msg']; unset($_SESSION['msg']); } ?>
      </h4>

    </form>
</div>


</body>
</html>
