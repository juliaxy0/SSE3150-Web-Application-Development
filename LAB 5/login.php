<!DOCTYPE html>
<html lang="en">

<?php
    $failure = false;
    $salt = 'XyZzy12*_';
    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

     if ( isset($_POST['who']) && isset($_POST['pass']) ) {
       if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
         $failure = "User name and password are required";
       } else {
         $check = hash('md5', $salt.$_POST['pass']);
         if ( $check == $stored_hash ) {

           header("Location: game.php?name=".urlencode($_POST['who']));
           return;
         } else {
           $failure = "Incorrect password";
         }
       }
     }
   ?>

<head>
  <title>RPS LOGIN 208256 JULIA NURFADHILAH</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=devicewidth, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
    <div class="jumbotron" id="head">
       <h1>Rock Paper Scissors Login Page</h1>
     </div>

     <div id="form" class="container">
         <form method="post">
             <p>Please log in to access the game :)</p>
             <label for="who">Username :</label>
             <input type="text" id="who" name="who" placeholder="Enter username here..." ></input><br>
             <label for="pass">Password :</label>
             <input type="text" id="pass" name="pass" placeholder="Enter password here..." ></input>
             <br>
             <input type="submit" value="Log in" ></input>
             <input type="reset" name="cancel" value="Cancel" onclick="location.href='index.php'"></input>

             <?php
            if ($failure !== false){
              echo ("<p>$failure</p>\n");
            }
      ?>

             </form>
     </div>
</body>
</html>
