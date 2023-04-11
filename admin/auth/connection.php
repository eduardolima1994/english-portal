<?php

  require realpath(__DIR__ . '/../../vendor/autoload.php');
  $env_path = realpath(__DIR__ . '/../../.env');
  if (!file_exists($env_path)) {
    die('.env file not found');
  }
  $dotenv = Dotenv\Dotenv::createImmutable(dirname($env_path));
  $dotenv->load();

  $host = $_ENV['DB_HOST'];
  $username = $_ENV['DB_USERNAME'];
  $password = $_ENV['DB_PASSWORD'];
  $dbname = $_ENV['DB_DATABASE'];
  
  $conn = new mysqli($host, $username, $password, $dbname);
  if ($conn->connect_errno) {
    echo "Failed to connect. " . $conn->connect_error;
    exit();
  }

?>