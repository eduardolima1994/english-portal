<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>English Portal - Admin Area</title>
</head>
<body>

  <form action="auth/validation.php" method="post">
  <fieldset>
  <legend>Admin Login</legend>
      <label for="txUsuario">User</label>
      <input type="text" name="usuario" id="txUsuario" maxlength="25" />
      <label for="txSenha">Password</label>
      <input type="password" name="senha" id="txSenha" />

      <input type="submit" value="Enter" />
  </fieldset>
  </form>
  
</body>
</html>