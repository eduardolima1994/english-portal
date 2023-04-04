<?php

  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      header("Location: ../"); exit;
  }

  $success = mysqli_connect("localhost", "root", "root", "english-portal") or trigger_error(mysql_error());

  $user = $_POST['usuario'];
  $password = $_POST['senha'];

  $query = mysqli_query($success, "SELECT `id`, `name`, `level` FROM `users` WHERE (`user` = '".$user ."') AND (`password` = '". sha1($password) ."') AND (`active` = 1) LIMIT 1");

  if (mysqli_num_rows($query) != 1) {

      echo "Login inválido!"; exit;

    } else {

      $resultado = mysqli_fetch_assoc($query);

      if (!isset($_SESSION)) session_start();

      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNome'] = $resultado['name'];
      $_SESSION['UsuarioNivel'] = $resultado['level'];

      header("Location: ../restricted"); exit;
  }

?>