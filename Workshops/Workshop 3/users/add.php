<?php
  include('../inc/validateSession.php');
  include('../utils/functions.php');
  $provinces = getProvinces();
  // Variables for the navbar:
  $message = "Usuario";
  $activePage = "users";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Users</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <?php include('../inc/nav.php'); ?>
  <div class="container-fluid">
    <div class="text-center my-2">
      <h1 class="display-4">Add Users</h1>
      <p class="lead">Adding a new user</p>
      <hr>
    </div>

    <form method="post" action="sendUser.php">
      <div class="form-group">
        <label for="first-name">First Name</label>
        <input id="first-name" class="form-control" type="text" name="firstName">
      </div>
      <div class="form-group">
        <label for="last-name">Last Name</label>
        <input id="last-name" class="form-control" type="text" name="lastName">
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" class="form-control" type="text" name="email">
      </div>
      <div class="form-group">
        <label for="province">Provincia</label>
        <select id="province" class="form-control" name="province">
          <?php
          foreach ($provinces as $province) {
            $id = $province['id'];
            $nameProvince = $province['name'];
            echo "<option value=\"$id\">$nameProvince</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="roles">Role</label>
        <select id="roles" class="form-control" name="role">
          <option value="user">User</option>
          <option value="admin">Administrator</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" class="form-control" type="password" name="password">
      </div>
      <button type="submit" class="btn btn-primary"> Add new user </button>
    </form>
  </div>

</body>

</html>