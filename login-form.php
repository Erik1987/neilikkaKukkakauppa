
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://www.google.com/recaptcha/api.js'></script>


<style>
body {font-family: Arial, Helvetica, sans-serif; width:50%;
    display: block;
    margin-left: 25%;
}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  border-radius: 5%;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 30%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<h2>Kirjaudu sisään:</h2>

<form action="login.php" method="post" name="Login-Form">
  <div class="imgcontainer">
    <img src="./images/avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="username"><b>Käyttäjätunnus</b></label>
    <input type="text" placeholder="Syötä käyttäjätunnus"id="username" name="username" required>

    <label for="email"><b>Sähköposti</b></label>
    <input type="text" placeholder="Syötä sähköpostiosoite"id="email" name="email" required>

    <label for="password"><b>Salasana</b></label>
    <input type="password" placeholder="Syötä salasana" id="password" name="password" required>
        
    <button type="submit" value="Login" name="login">Kirjaudu</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Muista minut
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <a href="index.php" class="cancelbtn" style="text-decoration: none; color: black;">Peruuta</a>
    <!--<button href="neilikka_bootstrap.php" type="button" class="cancelbtn">Peruuta</button> -->
    <span class="password">Unohtuiko <a href="register.php">salasana?</a></span>
  </div>
  <input type="hidden" name="submitted" value="1">
</form>

<?php include('./footer.php')?>
</body>
</html>