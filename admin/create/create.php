<?php

  if (!isset($_SESSION)) session_start();
  $nivel_necessario = 2;
  if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] <$nivel_necessario)) {
      session_destroy();
      header("Location: ../"); exit;
  }

?>

<h1>Create User</h1>

<form action="insert.php" method="post">
  <p>
    <label>Level</label><br>
    <label>
      <input type="radio" name="level" value=2>
      Administrator
    </label>
    <label>
      <input type="radio" name="level" value=1>
      Studant
    </label>
  </p>
  <p>
    <label>Name</label><br>
    <input type="text" name="name" required>
  </p>
  <p>
    <label>User</label><br>
    <input type="text" name="user" required>
  </p>
  <p>
    <label>Email</label><br>
    <input type="email" name="email" required>
  </p>
  <p>
    <label>Password</label><br>
    <input type="password" name="password" required>
  </p>
  <p>
    <button type="submit">Create</button>
  </p>
</form>