<?php

  require('../auth/session.php');

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
      header("Location: ../restricted"); exit;
  } else {
      echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
?>