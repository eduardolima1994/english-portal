<?php

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      header("Location: ../index.php"); exit;
  }

  // Tenta se conectar ao servidor MySQL
  $success = mysqli_connect("localhost", "root", "root", "english-portal") or trigger_error(mysql_error());

  $user = $_POST['usuario'];
  $password = $_POST['senha'];

  // Validação do usuário/senha digitados
  $query = mysqli_query($success, "SELECT `id`, `name`, `level` FROM `users` WHERE (`user` = '".$user ."') AND (`password` = '". sha1($password) ."') AND (`active` = 1) LIMIT 1");

  if (mysqli_num_rows($query) != 1) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      echo "Login inválido!"; exit;
  } else {
      // Salva os dados encontrados na variável $resultado
      $resultado = mysqli_fetch_assoc($query);

      // Se a sessão não existir, inicia uma
      if (!isset($_SESSION)) session_start();

      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNome'] = $resultado['name'];
      $_SESSION['UsuarioNivel'] = $resultado['level'];

      // Redireciona o visitante
      header("Location: restrito.php"); exit;
  }

?>