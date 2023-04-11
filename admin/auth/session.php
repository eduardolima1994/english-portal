<?php
  if (!isset($_SESSION)) session_start();
  $requiredLevel = 2;
  if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] <$requiredLevel)) {
      session_destroy();
      header("Location: ../"); exit;
  }
?>