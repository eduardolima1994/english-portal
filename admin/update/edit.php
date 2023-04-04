<?php

  require('../auth/session.php');

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
        header("Location: ../restricted"); exit;
  } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

?>