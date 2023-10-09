<?php
  include('../inc/validateSession.php');

  include('../utils/functions.php');
  $provinces = getProvinces();

  if ($_GET) {
    $id = $_GET['id'];
    $editUser = getUser($id);
  }

  // Variables for the navbar:
  $message = "Usuario";
  $activePage = "users";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Users</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <?php include('../inc/nav.php'); ?>
  <div class="container-fluid">
    <div class="text-center my-2">
      <h1 class="display-4">Edit Users</h1>
      <p class="lead">Editing an existing User</p>
      <hr>
    </div>
    <form method="post" action="sendUser.php">
      <input type="hidden" name="idUser" value="<?php echo $editUser['id']; ?>">
      <div class="form-group">
        <label for="first-name">First Name</label>
        <input id="first-name" class="form-control" type="text" name="firstName" value="<?php echo $editUser['firstname']; ?>">
      </div>
      <div class="form-group">
        <label for="last-name">Last Name</label>
        <input id="last-name" class="form-control" type="text" name="lastName" value="<?php echo $editUser['lastname']; ?>">
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" class="form-control" type="text" name="email" value="<?php echo $editUser['email']; ?>">
      </div>
      <div class="form-group">
        <label for="province">Provincia</label>
        <select id="province" class="form-control" name="province">
          <?php
          foreach ($provinces as $province) {
            $id = $province['id'];
            $nameProvince = $province['name'];
            $selected = ($id === $editUser['province_id']) ? 'selected' : '';
            echo "<option value=\"$id\" $selected>$nameProvince</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="roles">Role</label>
        <select id="roles" class="form-control" name="role">
          <option value="user" <?php if ($editUser['role'] === 'user') echo 'selected'; ?>>User</option>
          <option value="admin" <?php if ($editUser['role'] === 'admin') echo 'selected'; ?>>Administrator</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" class="form-control" type="text" name="password" value="<?php echo $editUser['password']; ?>">
      </div>
      <button type="submit" class="btn btn-primary"> Edit the user </button>
    </form>
  </div>
</body>

</html>