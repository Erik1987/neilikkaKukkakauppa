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
<header>
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
                  <li><a class="dropdown-item" href="#">Sisäkasvit</a></li>
                  <li><a class="dropdown-item" href="#">Ulkokasvit</a></li>
                  <li><a class="dropdown-item" href="#">Työkalut</a></li>
                  <li><a class="dropdown-item" href="#">Kasvienhoito</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Myymälät</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tietoa meistä</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="#">Ota yhteyttä</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login-form.php">Kirjaudu</a>
              </li>   
              <li class="nav-item">
                <a class="nav-link" href="register.php">Rekisteröidy</a>
              </li> 
            </ul>
          </div>
          <p>Avoinna:<br> ma-pe 7:00 - 18:00<br> la-su 9:00 - 18:00</p>
        </div>
        
      </nav>
</header>