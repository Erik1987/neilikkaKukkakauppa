<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>

 <style>
body {display: flex; min-height: 100vh; flex-direction: column;}
#container-fluid {background-image: url(./images/pexels-garden.jpg); width: 100%; height: 400px; background-repeat: no-repeat;
  background-size: 100%;}
  #navbar img {width:10%;height: fit-content;}
  #navbar p {text-align: center; color: rgb(247, 247, 247);}
  #header-textbox {
    height: 280px;
    max-width: 350px;
    background-color: rgba(255,255,255,0.4);
    padding: 15px;
}

#header-textbox h2, #header-textbox p {
    padding: 5px;
    color: black;
}

</style>

<header id="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="navbar">
        <div class="container-fluid">
          <img src="images/logo.png"></img>
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Etusivu</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Tuotteet</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="kasvit.php">Sisäkasvit</a></li>
                  <li><a class="dropdown-item" href="#">Ulkokasvit</a></li>
                  <li><a class="dropdown-item" href="#">Työkalut</a></li>
                  <li><a class="dropdown-item" href="#">Kasvienhoito</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="myymalat.php">Myymälät</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tietoa.php">Tietoa meistä</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="yhteytta.php">Ota yhteyttä</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="login-form.php"><i class="fas fa-sign-in-alt mr-2"></i>Kirjaudu</a>
              </li>   
              <li class="nav-item">
              <a class="nav-link" href="register.php"><i class="fas fa-user-plus mr-2"></i>Rekisteröi</a>
              </li> 
              <?php 
              if(isset($_SESSION['loggedin'])) {
                echo '<li class="nav-item">
                <a class="nav-link" href="dashboard.php"><i class="fas fa-user-plus mr-2"></i>Profiili</a>
                </li> ';
                echo '<li class="nav-item">
                <a class="nav-link" href="logout.php">Ulos</a>
                </li> ';
              }
              
               ?>
            </ul>
            <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Ostoskori
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>
          </div>
          <p>Avoinna:<br> ma-pe 7:00 - 18:00<br> la-su 9:00 - 18:00</p>
        </div>
        
      </nav>
</header>




