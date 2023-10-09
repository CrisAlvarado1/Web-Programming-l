<?php
  include("inc/validateSession.php");
  // Variables for the navbar:
  $message = "Bienvenido";
  $activePage = "dashboard";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <?php include('inc/nav.php'); ?>
  <div class="container">
    <div class="container text-center my-4">
      <h1>Dashboard</h1>
    </div>
  </div>
</body>
</html>