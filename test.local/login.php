<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

define("TITLE", "Login form");
include('templates/header.phtml');

$hint = "

    Use 'me' and '123' for email and password.

";
$emptyMsg = "

    Email or Password is not entered.

";
$successMsg = "

    You are in!

";
$failMsb = "

    Denied!
";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    if ( (!empty($email)) && (!empty($pass)) ) {
        
        if ( (strtolower($email) == "me") && (strtolower($pass) == "123") )  {
            // succeeded
            //print $successMsg;
            // re-direct to welcome page instead of showing a success message
            ob_end_clean();
            
            $user = urlencode( 'Long');
            
            header("Location: welcome.php?name=$user");
            exit();
        }        
        else { 
            //wrong email or password
            print $failMsb;
        }
    } 
    else {    
        // empty email or password
        print $emptyMsg;
    }
} else {
    // GET page
    print $hint;
    include 'loginBase.html';
}

include 'templates/footer.phtml'; 
?>