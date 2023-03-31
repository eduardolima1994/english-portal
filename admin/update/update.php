<?php

  require('../auth/session.php');

  $id = $_REQUEST['id'];

?>

<h1>Update User</h1>

<form action="edit.php?id=<?php echo $id ?>" method="post">
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
    <button type="submit">Update</button>
  </p>
</form>