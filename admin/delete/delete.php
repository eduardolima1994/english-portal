<?php

  if (!isset($_SESSION)) session_start();
  $nivel_necessario = 2;
  if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] <$nivel_necessario)) {
      session_destroy();
      header("Location: ../"); exit;
  }

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "english-portal";

  $id = $_REQUEST['id'];

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "DELETE FROM `users` WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
      header("Location: ../auth/restrito.php"); exit;
  } else {
      echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
?>