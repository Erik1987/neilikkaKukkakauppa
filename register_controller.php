<?php
   
    // Database connection
    include('./db.php');
   // include('../vakiot.php');
    
    
    // Database connection
$polku = "http://localhost";
$projekti = "/hello/PHP/neilikka";

require './tunnukset.php';
include('posti.php');


    // Swiftmailer lib
    //require_once './lib/vendor/autoload.php';
    
    // Error & success messages
    global $success_msg, $email_exist, $_emailErr, $_passwordErr;
    global $UsernameEmptyErr, $user_NameErr, $emailEmptyErr, $passwordEmptyErr, $email_verify_err, $email_verify_success;
    
    // Set empty form vars for validation mapping
    $_username = $_email = $_password = "";

    if(isset($_POST["register"])) {
        $username      = $_POST["username"];
        $email         = $_POST["email"];
        $password      = $_POST["password"];
        
        // check if email already exist
        $email_check_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}' ");
        $rowCount = mysqli_num_rows($email_check_query);

       
         // clean the form data before sending to database
         $_email = mysqli_real_escape_string($connection, $email);
         $_username = mysqli_real_escape_string($connection, $username);
         $_password = mysqli_real_escape_string($connection, $password);
       // PHP validation
        // Verify if form values are not empty
        if(!empty($username) && !empty($email) && !empty($password)){
            
            // check if user email already exist
            if($rowCount > 0) {
                $email_exist = '
                    <div class="alert alert-danger" role="alert">
                        User with email already exist!
                    </div>
                ';
                 } 
            
            else {
                // clean the form data before sending to database
                $_email = mysqli_real_escape_string($connection, $email);
                $_username = mysqli_real_escape_string($connection, $username);
                $_password = mysqli_real_escape_string($connection, $password);
               
                // perform validation
                if(!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
                    $_emailErr = '<div class="alert alert-danger">
                            Email format is invalid.
                        </div>';
                }
                if(!preg_match("/^.{8,20}$/", $_username)) {
                    $user_NameErr = '<div class="alert alert-danger">
                            Only 10-digit mobile numbers allowed.
                        </div>';
                }
                if(!preg_match("/^.{8,20}$/", $_password)) {
                    $_passwordErr = '<div class="alert alert-danger">
                             Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                        </div>';
                }
            }
            
                // Store the data in db, if all the preg_match condition met
                if((filter_var($_email, FILTER_VALIDATE_EMAIL))){
                    
                    // Generate random activation token
                    $token = md5(rand().time());

                    // Password hash
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);

                    // Query
                    $sql = "INSERT INTO users (username, email, password, token, is_active,
                    date_time) VALUES ('$username', '$email', '$password_hash', 
                    '$token', '0', now())";
                    
                    
                    // Create mysql query
                    $sqlQuery = mysqli_query($connection, $sql);
                    
                    if(!$sqlQuery){
                        die("MySQL query failed!" . mysqli_error($connection));
                    } 
                   
                    // Send verification email
                    if($sqlQuery) {
                       
                        $msg = 'Click on the activation link to verify your email. <br><br>
                          <a href="$polku/$projekti/user_verificaiton.php?token='.$token.'"> Click here to verify email</a>
                        ';
                        $subject = "Please Verify Email Address!";
                        $result = posti($email,$msg,$subject);
                          echo $result;
                        if(!$result){
                            $email_verify_err = '<div class="alert alert-danger">
                                    Verification email coud not be sent!
                            </div>';
                        } else {
                            $email_verify_success = '<div class="alert alert-success">
                                Verification email has been sent!
                            </div>';
                            echo '<p style="color: green;">User Registered!</p>';
                            header("Location: login-form.php");
                        }
                    }
                
                }
            
        } else {
            
            if(empty($email)){
                $emailEmptyErr = '<div class="alert alert-danger">
                    Email can not be blank.
                </div>';
            }
            if(empty($username)){
                $user_NameErr = '<div class="alert alert-danger">
                    Mobile number can not be blank.
                </div>';
            }
            if(empty($password)){
                $passwordEmptyErr = '<div class="alert alert-danger">
                    Password can not be blank.
                </div>';
            }            
        }
      
    }
   

?>