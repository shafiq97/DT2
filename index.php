<?php include 'settings.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Musa Abbasov">
  <title>Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
  <link rel="icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/8/8f/International_Islamic_University_Malaysia_logo.svg/1200px-International_Islamic_University_Malaysia_logo.svg.png" type="image/icon type">
  <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <img style="display: block; margin: auto; background-color: transparent; border: 0; max-width: 150px; padding-top: 100px" src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8f/International_Islamic_University_Malaysia_logo.svg/1200px-International_Islamic_University_Malaysia_logo.svg.png">  
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <p>DOCUMENT TRACKING SYSTEM</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="includes/login.php" method="POST">
              <div class="form-label-group">
                <input name="login" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>
              <div class="form-label-group">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase uia" type="submit" name="submit">Sign in</button>
            </form>
            <div class="form-label-group pt-2" style="text-align: center;">
                <a href="register.php">Dont have an account? Register here</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
