<?php
include 'header.php';

 ?>


 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="style.css">
    <title>Käyttäjäpaneeli</title>
</head>
<body>
<?php
  include 'db.php';
  //session_start();
$id=$_SESSION['id'];
$query=mysqli_query($connection,"SELECT * FROM users where id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
<div class="card ">
   <div class="card-header">
          <h3>Käyttäjän Profiili <span class="float-right"> <a href="index.php" class="btn btn-primary">Takaisin</a> </h3>
        </div>
        <div class="card-body">
        <div class="profile-input-field">
        <h3>Muuta tietoja</h3>
        <form method="post" action="#" >
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" style="width:20em;" placeholder="Syötä käyttäjätunnus" value="<?php echo $row['username']; ?>" required />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" style="width:20em;" placeholder="Syötä sähköposti" required value="<?php echo $row['email']; ?>" />
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" style="width:20em;" placeholder="Syötä salasana" value="<?php echo $row['password']; ?>">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Tallenna" style="width:20em; margin:0;"><br><br>
            <center>
                <form method="post">
                  <input class="btn btn-danger" type="submit" name="delete" value="Poista käyttäjä"></input>
              </form>
           </center>
          </div>
        </form>
      </div>
</body>
</html>
<?php if(isset($_POST['delete'])) {
                if($_POST['delete']) {
                     $query = "DELETE FROM `users` WHERE id = '$id'";
                     $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                     header('Location: logout.php');
                   }}
?>
<?php
      if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

         // clean the form data before sending to database
         $_email = mysqli_real_escape_string($connection, $email);
         $_username = mysqli_real_escape_string($connection, $username);
         $_password = mysqli_real_escape_string($connection, $password);

         $password_hash = password_hash($_password, PASSWORD_BCRYPT);

      $query = "UPDATE users SET username = '$username',
                      email = '$email', password = '$password_hash'
                      WHERE id = '$id'";
                    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                    
                   
                    ?>
                     <script type="text/javascript">
            alert("Päivitys onnistui.");
            window.location = "index.php";
        </script>
        
        <?php
             }     
?>

  <?php
  include 'footer.php';

  ?>