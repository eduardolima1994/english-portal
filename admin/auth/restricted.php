<title>English Portal - Admin Area</title>

<?php

  if (!isset($_SESSION)) session_start();
  $nivel_necessario = 2;
  if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] <$nivel_necessario)) {
      session_destroy();
      header("Location: ../"); exit;
  }

?>

  <h1>Administrator Area</h1>
  <p>Welcome, <?php echo $_SESSION['UsuarioNome']; ?>!</p>

<?php
  $success = mysqli_connect("localhost", "root", "root", "english-portal") or trigger_error(mysql_error());
  $dados = mysqli_query($success, "SELECT * FROM `users`") or die(mysqli_error());
  $linha = mysqli_fetch_assoc($dados);
  $total = mysqli_num_rows($dados);
?>

<a href="../create/create.php">Create user</a>

<table border="1px">
	<caption>Account Management:</caption>
	<thead>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Level</th>
		<th>Active</th>
		<th>Register</th>
		<th>Update</th>
		<th>Calendar</th>
		<th>Alter</th>
    <th>Delete</th>
	</tr>
	</thead>
	<tbody>

<?php
	if($total > 0) {
		do {
?>
        
	<tr>
		<td><?=$linha['id']?></td>
		<td><?=$linha['user']?></td>
		<td><?=$linha['email']?></td>
		<td><?php
      if($linha['level'] == 1){
        echo 'STUDENT';
      }else{
        echo 'ADMIN';
      }
    ?></td>
		<td><?php
      if($linha['active'] == 1){
        echo 'ACTIVE';
      }else{
        echo 'DEACTIVE';
      }
    ?></td>
		<td><?=$linha['register']?></td>
		<td><?=$linha['update']?></td>
    <td><a href="../../calendar/calendar.php?id=<?=$linha['id']?>">[Calendar]</a></td>
		<td><a href="../update/update.php?id=<?=$linha['id']?>">[Alter]</a></td>
		<td><?php
      if($linha['level'] == 2){
        echo '-';
      }else{
        ?>
        <a href="../delete/delete.php?id=<?=$linha['id']?>" onclick="return confirm('Do you really want to delete the student?');">[Delete]</a>
      <?php
      }
    ?></td>
	</tr>	
  
<?php
		}while($linha = mysqli_fetch_assoc($dados));
	}
?>

</tbody>
</table>

<p><a href="logout.php">Logout</a></p>
