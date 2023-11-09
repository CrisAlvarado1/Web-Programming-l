<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">
      <?php if (isset($_SESSION['user']['url_image'])) : ?>
        <img src="<?php echo "http://isw613.com/Workshop%207/".$_SESSION['user']['url_image']; ?>" alt= "Profile Image" class="img-fluid rounded-circle" style="width: 50px; height: 50px; margin-right: 10px;">
      <?php endif; ?>
      <?php echo $message . " " . $user['firstname'];?>
    </span>
  </div>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="container-fluid justify-content-end">
      <div class="navbar-nav">
        <!-- Check on which page it is based on the variable to add 'active' class. -->
        <a class="nav-link fs-5 <?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>" href="/Workshop%207/dashboard.php">Home</a>
        <a class="nav-link fs-5" <?php echo ($activePage == 'trees') ? 'active' : ''; ?> href="#">Arboles</a>
        <?php if ($user['role'] === 'admin') { ?>
          <a class="nav-link <?php echo ($activePage == 'users') ? 'active' : ''; ?>" href="/Workshop%207/users/users.php">Users</a>
        <?php } ?>
        <a class="nav-link fs-5" href="/Workshop%207/logout.php" tabindex="-1" aria-disabled="true">Logout</a>
      </div>
    </div>
  </div>
</nav>