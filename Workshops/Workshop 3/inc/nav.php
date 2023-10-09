<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1"><?php echo $message . " " . $user['firstname']; ?> </span>
  </div>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="container-fluid justify-content-end">
      <div class="navbar-nav">
        <!-- Check on which page it is based on the variable to add 'active' class. -->
        <a class="nav-link fs-5 <?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>" href="http://isw613.com/Workshop%203/dashboard.php">Home</a>
        <a class="nav-link fs-5" <?php echo ($activePage == 'trees') ? 'active' : ''; ?> href="#">Arboles</a>
        <?php if ($user['role'] === 'admin') { ?>
          <a class="nav-link <?php echo ($activePage == 'users') ? 'active' : ''; ?>" href="http://isw613.com/Workshop%203/users/users.php">Users</a>
        <?php } ?>
        <a class="nav-link fs-5" href="/Workshop%203/logout.php" tabindex="-1" aria-disabled="true">Logout</a>
      </div>
    </div>
  </div>
</nav>