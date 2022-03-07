<?php include('db.php'); 

// never use unencrypted cookies in real production
if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass = md5($password);
        $password = password_verify($password, $_POST['password']);
        echo $password;
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);
        
        $row = mysqli_num_rows($result);
        if($row > 0) {

            // session 
            $userdata = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $userdata['id'];
            if(!empty($_POST['remember'])) {
                $remember = $_POST['remember'];
                setcookie('username', $email, time()+3600*24*7);
                setcookie('email', $email, time()+3600*24*7);
                setcookie('password', $password, time()+3600*24*7);
            }else {
                
                // expire
                setcookie('username', $username, 30);
                setcookie('email', $email, 30);
                setcookie('password', $password, 30);
            }

        }else {
            echo 'invalid login';
        }
}
?>

<?php
   
    // Database connection
    include('db.php');

    global $wrongPwdErr, $accountNotExistErr, $emailPwdErr, $verificationRequiredErr, $email_empty_err, $pass_empty_err;

    if(isset($_POST['login'])) {
        $email_signin        = $_POST['email'];
        $password_signin     = $_POST['password'];
        
        // clean data 
        $user_email = filter_var($email_signin, FILTER_SANITIZE_EMAIL);
        $pswd = mysqli_real_escape_string($connection, $password_signin);

        // Query if email exists in db
        $sql = "SELECT * From users WHERE email = '{$email_signin}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);
       
        // If query fails, show the reason 
        if(!$query){
           die("SQL query failed: " . mysqli_error($connection));
        }

        if(!empty($email_signin) && !empty($password_signin)){
            if(!preg_match("/^.{8,20}/", $pswd)) {
                $wrongPwdErr = '<div class="alert alert-danger">
                        Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                    </div>';
                    
            }
            // Check if email exist
            if($rowCount <= 0) {
                $accountNotExistErr = '<div class="alert alert-danger">
                        User account does not exist.
                    </div>';
            } else {
                // Fetch user data and store in php session
                while($row = mysqli_fetch_array($query)) {
                    $id            = $row['id'];
                    $email         = $row['email'];
                    $pass_word     = $row['password'];
                    $token         = $row['token'];
                    $is_active     = $row['is_active'];
                }
                
                // Verify password
                $password = password_verify($password_signin, $pass_word);

                // Allow only verified user
                if($is_active == '1') {
                    if($email_signin == $email && $password_signin == $password) {
                       
                       $_SESSION['id'] = $id;
                       $_SESSION['email'] = $email;
                       $_SESSION['token'] = $token;
                       $_SESSION['username'] = $username;
                       $_SESSION['loggedin'] = true;

                        /* JAu */
                       if (isset($_SESSION['next_page'])){
                         $next_page = $_SESSION['next_page'];
                         unset($_SESSION['next_page']);
                         header("location: $next_page");
                         exit;
                        }

                       header("Location: ./dashboard.php");
                       exit;
            

                    } else {
                        $emailPwdErr = '<div class="alert alert-danger">
                                Either email or password is incorrect.
                            </div>';
                    }
                } else {
                    $verificationRequiredErr = '<div class="alert alert-danger">
                            Account verification is required for login.
                        </div>';
                }

            }

        } else {
            if(empty($email_signin)){
                $email_empty_err = "<div class='alert alert-danger email_alert'>
                            Email not provided.
                    </div>";
            }
            
            if(empty($password_signin)){
                $pass_empty_err = "<div class='alert alert-danger email_alert'>
                            Password not provided.
                        </div>";
            }            
        }

    }

?>   
<?php 
require_once('Session.php');
Session::set('login', 'value');?>

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
<div class="card ">
  <div class="card-header">
          <h3 class='text-center'><i class="fas fa-sign-in-alt mr-2"></i>Kirjaudu sisään</h3>
        </div>

<form action="" method="post" name="Login-Form">
  <div class="imgcontainer">
    <img src="./images/avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="username"><b>Käyttäjätunnus</b></label>
    <input type="text" placeholder="Syötä käyttäjätunnus"id="username" name="username" required <?php if(isset($_COOKIE['username'])){
      echo $_COOKIE['username'];
    };?>">
    <?php echo $accountNotExistErr?>
    <label for="email"><b>Sähköposti</b></label>
    <input type="text" placeholder="Syötä sähköpostiosoite"id="email" name="email" value="<?php if(isset($_COOKIE['email'])){
      echo $_COOKIE['email'];
    };?>">
    <?php echo $email_empty_err?>
    <label for="password"><b>Salasana</b></label>
    <input type="password" placeholder="Syötä salasana" id="password" name="password" required value="<?php if(isset($_COOKIE['password'])){
      echo $_COOKIE['password'];
    };?>">
    <?php echo $wrongPwdErr?>    
    <button type="submit" value="Login" name="login">Kirjaudu</button>
    <label>
      <input type="checkbox" checked="checked" name="remember" id="remember"> Muista minut
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