<?php

  $host = "localhost";
  $dbname = "english-portal";
  $username = "root";
  $password = "root";
  
  $conn = new mysqli($host, $username, $password, $dbname);
  if ($conn->connect_errno) {
    echo "Falha ao conectar: " . $conn->connect_error;
    exit();
  }

?>