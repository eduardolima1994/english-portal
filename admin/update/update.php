<?php

  require('../auth/session.php');

  $id = $_REQUEST['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>English Portal - Admin Area - Welcome <?php echo $_SESSION['UsuarioNome']; ?>!</title>
  <link rel="stylesheet" href="../restricted/vendors/feather/feather.css">
  <link rel="stylesheet" href="../restricted/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../restricted/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../restricted/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../restricted/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../restricted/images/logo.png" alt="logo">
              </div>
              <h4>Update User</h4>
              <form class="pt-3" action="edit.php?id=<?php echo $id ?>" method="post">
                <div class="form-group">
                    <input type="radio" name="level" value=2 required>
                    Administrator
                    <input type="radio" name="level" value=1 required>
                    Studant
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Name" name="name" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="user" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Update</button>
                </div>
              </form>
              <div class="text-center mt-4 font-weight-light">
                  Return to the <a href="../restricted" class="text-primary">Admin Panel</a>.
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../restricted/vendors/js/vendor.bundle.base.js"></script>
  <script src="../restricted/js/off-canvas.js"></script>
  <script src="../restricted/js/hoverable-collapse.js"></script>
  <script src="../restricted/js/template.js"></script>
  <script src="../restricted/js/settings.js"></script>
  <script src="../restricted/js/todolist.js"></script>
</body>

</html>
