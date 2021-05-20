<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url()."asset/CustomCSSJS/ModalJavascript.js"?>"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()."asset/CustomCSSJS/HeaderStyle.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/CustomCSSJS/BodyCustomStyle.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/FA/fontawesome/css/all/css" ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/CustomCSSJS/LoginStyle.css" ?>">
    <title>Reimbursement Management System</title>
  </head>
  <div class="container-fluid" style="position: relative; left: 0; top: 0;">
    <img src="<?php echo base_url()."asset/Icon&IllustrationKRMS/Icon&IllustrationKRMS/BackgroundLogin.svg"; ?>" alt="" style="width: 100%; height: 100%; position: relative; top: 0; left: 0; z-index: 1;">
    <img src="<?php echo base_url()."asset/Icon&IllustrationKRMS/Icon&IllustrationKRMS/IllustrationLogin.svg"; ?>" style="width: 100%; height: 80%; z-index: 3; position:absolute; top:60px; left:5px;">
  </div>
  <div class="container-fluid">
    <body class="d-flex">
      <div class="headingPage text-center">
        <h1>Reimbursement Management System</h1>
      </div>
      <main class="mainForm">
        <h1 class="h3 mb-3 text-center" id="SignInText">Sign In</h1>
        <!-- cek pesan notifikasi -->
        <?= isset($_SESSION['p']) ? $_SESSION['p'] : "" ?>
        <form action="<?php echo base_url().'index.php/LoginController/checkUser'; ?>" method="post">
          <div class="form-floating">
            <input type="text" class="form-control" id="username" name="username">
            <label for="inputUsername">Username</label>
          </div>
          <div class="form-floating mb-3">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
              <input type="password" class="form-control" id="password" name="password">
              <label for="InputPassword">Password</label>
              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" name="" value="remember me" id="rememberMe">
              Remember me
            </label>
          </div>
          <button type="submit" class="w-100 btn btn-primary" id="btnLogin">Log In</button>
        </form>
      </main>
    </body>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script>
	$(".toggle-password").click(function() {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});
</script>
</html>
