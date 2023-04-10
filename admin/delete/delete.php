<?php

  require('../auth/session.php');
  require('../auth/connection.php');

  $id = $_REQUEST['id'];

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