<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>English Portal - Admin Area</title>
  <link rel="stylesheet" href="restricted/vendors/feather/feather.css">
  <link rel="stylesheet" href="restricted/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="restricted/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="restricted/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="restricted/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="restricted/images/logo.png" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="auth/validation.php" method="post">
                <div class="form-group">
                  <input type="text" name="usuario" id="txUsuario" maxlength="25" class="form-control form-control-lg" placeholder="Username">
                </div>
                <div class="form-group">
                  <input name="senha" id="txSenha" type="password" class="form-control form-control-lg" placeholder="Password">
                </div>
                <div class="mt-3">
                  <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="SIGN IN" />
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="#" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  
</body>

</html>
