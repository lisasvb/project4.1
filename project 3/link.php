<nav class="navbar navbar-expand-lg navbar-light "  id="nav">
                    <a class="navbar-brand" href="#">
                    <img src="./img/hers.jpg" width="60" height="60" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                    <li class="nav-item active">
        <a class="nav-link" href="./index.php?content=home"><h5>Home</h5> <span class="sr-only">(Current)</span></a>
        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?content=contact"><h5>Contact</h5></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?content=over"><h5>Geheugen verlies</h5></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?content=weetjes"><h5>Weetjes</h5></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?content=iot"><h5>IOT</h5></a>
                            </li>
<?php


if ( isset($_SESSION["ID"])) {
    switch($_SESSION["userrol"]) {
      case 'administrator':
        echo '<li class="nav-item">
                <a class="nav-link" href="./index.php?content=administrator_home"><h5>AdminHome<h5><span class="sr-only">(current)</span></a>
              </li>';
        echo '<li class="nav-item">
                <a class="nav-link" href="./index.php?content=gebruikersrollen"><h5>Gebruikersrollen<h5><span class="sr-only">(current)</span></a>
              </li>';
      break;
      case 'root': 
        echo '<li class="nav-item">
                <a class="nav-link" href="./index.php?content=root_home"><h5>RootHome<h5><span class="sr-only">(current)</span></a>
              </li>';
      break;
      case 'customer':
        echo '<li class="nav-item">
                <a class="nav-link" href="./index.php?content=customer_home"><h5>CustomerHome<h5><span class="sr-only">(current)</span></a>
              </li>';
      break;
      case 'moderator':
        echo '<li class="nav-item">
                <a class="nav-link" href="./index.php?content=moderator_home"><h5>ModeratorHome<h5><span class="sr-only">(current)</span></a>
              </li>';
      break;
      default:
        header("Location: url=./index.php?content=logoutform");
      break;
    }          
    echo '<li class="nav-item">
            <a class="nav-link" href="./index.php?content=logoutform"><h5>Uitloggen<h5></a>
          </li>';
  } else {
    echo '<li class="nav-item">
            <a class="nav-link" href="./index.php?content=registerform"><h5>Registreer<h5></a>
          </li>';
    echo '<li class="nav-item">
            <a class="nav-link" href="./index.php?content=loginform"><h5>Inloggen<h5></a>
          </li>';
  }
?>
</ul>
</div>
</nav>