<?php

  require('../auth/session.php');
  require('../auth/connection.php');

  $id = $_REQUEST['id'];
  $name = $_POST["name"];
  $user = $_POST["user"];
  $pass = $_POST["password"];
  $email = $_POST["email"];
  $level = $_POST["level"];

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  echo "Connected successfully";
  
  $sql = "UPDATE `users` SET `name` = '$name', `user` = '$user', `password` = SHA1('$pass'), `email` = '$email', `level` = $level, `update` = NOW() WHERE `id` = $id;";
  if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New user created successfully');</script>";
        header("Location: ../restricted"); exit;
  } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

?>