<?php

  if (!isset($_SESSION)) session_start();
  $nivel_necessario = 2;
  if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] <$nivel_necessario)) {
      session_destroy();
      header("Location: ../"); exit;
  }

  $id = $_REQUEST['id'];
  $name = $_POST["name"];
  $user = $_POST["user"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $level = $_POST["level"];

  $servername = "localhost";
  $database = "english-portal";
  $username = "root";
  $password = "root";

  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  echo "Connected successfully";
  
  $sql = "UPDATE `users` SET `name` = '$name', `user` = '$user', `password` = SHA1('$password'), `email` = '$email', `level` = $level, `update` = NOW() WHERE `id` = $id;";
  if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New user created successfully');</script>";
        header("Location: ../auth/restrito.php"); exit;
  } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

?>