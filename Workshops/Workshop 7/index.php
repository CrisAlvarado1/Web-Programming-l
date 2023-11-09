<?php
  $message = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Login</title>
</head>
<body>
    <section>
      <div class="container mt-5 pt-5">
        <div class="row">
          <div class="col-12 col-sm8 col-md-6 m-auto">
            <div class="card border-2 shadow">
              <div class="card-body text-center bg-light">
                <svg class="mx-auto my-4" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                <h1>User Login</h1>
                <div class="msg"> 
                  <?php echo $message; ?>
                </div>
                <form action="login.php" method="POST" class="form-inline" role="form">
                  <input type="text" class="form-control my-3 py-2" name="username" placeholder="Your username" required>
                  <input type="password" class="form-control my-3 py-2" name="password" placeholder="Your password" required>
                  <div class="text-center mt-3">
                    <input type="submit" class="btn btn-primary" value="Login"></input>
                    <a href="/Workshop%204/index.php" class="btn">Clear</a>
                  </div>
                  <div class="text-center mt-3">
                    <a href="/Workshop%207/signup.php" class="link-primary">Don't have an account yet? Sign up here!</a>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
</html>