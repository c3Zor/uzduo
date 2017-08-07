<nav class="navbar navbar-default main-wrapper">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Home</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?php if (isset($_SESSION['u_id'])) {
     echo '
        <li class=""><a href="addnew.php">Add New <span class="sr-only">(current)</span></a></li>
        <li class=""><a href="#">Daily Poll<span class="sr-only">(current)</span></a></li>'; } ?>
      </ul>
<?php if (isset($_SESSION['u_id'])) {
     echo '<ul class="nav navbar-nav navbar-right">
      <form class="navbar-form navbar-left" action="includes/logout.inc.php" method="POST">
      <button type="submit" class="btn btn-default" name="submit">Logout</button>
      </form>
      </ul>';
    } else {
      echo '<ul class="nav navbar-nav navbar-right">
      <form class="navbar-form navbar-left" action="includes/login.inc.php" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" name="uid"  placeholder="Username/e-mail">
          <input type="password" class="form-control" name="pwd" placeholder="password">
        </div>
         
        <button type="submit" name="submit" class="btn btn-default">Login</button>
      </form>
        <ul class="nav navbar-nav navbar-left">
          <li>
            <a class="navbar-brand" href="signup.php">Sign up</a>
          </li>
        </ul>
      </ul>';
    } 
    ?>
    </div>
  </div>
</nav>