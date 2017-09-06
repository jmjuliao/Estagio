<?php
  $mysqli = new mysqli('127.0.0.1', 'root', '', 'estagio');

  if (!$mysqli) {
    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }

  if($_POST != null){

    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'; ";
    $query = $mysqli->query($sql);
    $dados = $query->fetch_assoc();

    if ($dados != null) {

      mysqli_close($mysqli);
      session_start();
      $_SESSION['nome'] = $dados['nome'];
      $_SESSION['nivelAcesso'] = $dados['nivelAcesso'];

      if($_SESSION['nivelAcesso'] == "al"){
        header("location: ./AcessoAluno/estagio.php");
      }else if ($_SESSION['nivelAcesso'] == "ad"){
        header("location: ./AcessoAdm/aluno.php");
      }else{
        header("location: ./AcessoProfessor/relatorio_periodico.php");
      }
    }else{
      mysqli_close($mysqli);
      session_start();
      $_SESSION['msg'] = "Login e/ou Senha incorretos";
      header("location: index.php");
    }
  }

 ?>
