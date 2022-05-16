<?php

require_once "config.php";
require_once "config.php";

if [$_SERVER["REQUEST_METHOOD"] == "POST" && isset($_POST['submit'])) {
  
  $fullname = trim($_POST['name']);
  $email = trim($_POST['email']);  
  $password = trim($_POST['password']);   
  $confirm_password = trim($_POST['confirm_password']);   
  $password_hash = password_hash($password, PASSWORD_BCRYPT);
  
  if($query = $db->prepare("SELECT * FROM users WHERE email = ?")) {
    $error = '';
    
    $query->bind_param('s', $email);
    $query->execute();
    
    $query->store_result();
        if ($query->num_rows > 0) {
            $error .= '<p class="error">An account with this email address already registered!</p>';
        } else {
          
          if (strlen($password ) < 6 {
            $error .= '<p class="error">Please confirm your password</p>';
          } else {
              if (empty($error) && ($password != $confirm_password)) {
                $error .= '<p class "error">The Passwords do not match</p>';
              }
          }
              if (empty($error) ) {
                $insertQuery= $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?);");
                $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
                $result = $insertQuery->execute();
                if ($result) {
                   $error .= '<p class="success">You have successfully registered for a Double AHK Account. Have fun!</p>'
                  } else {
                      $error .= '<p class="error">Something went wrong!</p>';
                }
              }
            }
         }
              $query->close();
              $insertQuery->close();
              
              mysqli_close($db)
             

<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;
  background-image: url("DC6F867E-D69A-4969-9F2E-05D88FB92601.jpeg");
   background-size: 300px 100px;}
* {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
.signupbtn {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
  float: right;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn1 {
  
  background-color: #f44336;
    color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
  float: left;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
</style>
<body>

<center><form action="/action_page.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    
    <label for="Full-Name"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="Full-Name" required>
   
    <label for="Email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-confirm"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="psw-repeat" required>
    
    
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <center><button type="button" class="cancelbtn1">Cancel</button></center>
      <center><button type="submit" class="signupbtn">Sign Up</button></center>
    </div>
  </div>
  </form></center>

</body>
</html>
