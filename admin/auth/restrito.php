<?php

  if (!isset($_SESSION)) session_start();

  $nivel_necessario = 2;

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] <$nivel_necessario)) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: ../index.php"); exit;
  }

?>

  <h1>Administrator Area</h1>
  <p>Welcome, <?php echo $_SESSION['UsuarioNome']; ?>!</p>

<?php

  $success = mysqli_connect("localhost", "root", "root", "english-portal") or trigger_error(mysql_error());

  // executa a query
  $dados = mysqli_query($success, "SELECT * FROM `users`") or die(mysqli_error());
  // transforma os dados em um array
  $linha = mysqli_fetch_assoc($dados);
  // calcula quantos dados retornaram
  $total = mysqli_num_rows($dados);
?>

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
		<th>Alterar</th>
    <th>Deletar</th>
	</tr>
	</thead>
	<tbody>

<?php
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
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
		<td>[X]</td>
		<td>[X]</td>
	</tr>	

<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($dados));
	// fim do if
	}
?>

</tbody>
</table>

<p><a href="logout.php">Voltar</a></p>
