<?php

  require('../auth/session.php');
  require('../auth/connection.php');

  $name = $_POST["name"];
  $user = $_POST["user"];
  $pass = $_POST["password"];
  $email = $_POST["email"];
  $level = $_POST["level"];

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  echo "Connected successfully";
  
  $sql = "INSERT INTO `users` VALUES (NULL, '$name', '$user', SHA1('$pass'), '$email', '$level', 1, NOW( ), NOW( ));";

  if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New user created successfully');</script>";
        header("Location: ../restricted"); exit;
  } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

?>