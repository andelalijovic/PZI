<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/playgrounds.php">Playgrounds</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="/appointments.php">Appointments</a>
    </li> -->
  </ul>
  <?php
  if(!empty($_SESSION["username"])) {
        echo '<form>
                  <div class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"><a href="/logout.php">Log Out</a></div>
                  <div class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"><a href="/profile.php">' . $_SESSION["username"] .'</a></div>
              </form>';
    } else {
        echo '<form>
                  <div class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"><a href="/register.php">Register</a></div>
                  <div class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"><a href="/login.php">Log In</a></div>
              </form>';
    }
  ?>
</nav>