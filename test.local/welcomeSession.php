<?php

session_name('Longsvisit');
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

define("TITLE", "Welcome page using session");
include('templates/header.phtml');
?>

<?php
        
    $user =$_GET["name"];
    
    $email = $_SESSION['email'];
    $lastLoggedin = $_SESSION['lastLoggedin'];
    
    if ( !$email || !$lastLoggedin)
        exit ();
    
    if ( !$user) {
        $user = 'user';
    }
    print " 
            <h2>
                Welcome $user !
            </h2>
            ";
    
    $datetimeFormat  = date('Y-M-d g:i a', $lastLoggedin);
    print "
        <p>
    Email: $email
        </p>
        <p>
    Last logged in: $datetimeFormat
        </p>";     
    
//    print '
//        <p>
//    Email: ' . $email
//        . '</p>
//        <p>
//    Last logged in: ' . $datetimeFormat
//        . '</p>';   
    
    $now = new DateTime();
    print '
        Time now is ' . $now->format('Y-M-d H:i');
        
?>

<p>
    <a href="logoutSession.php">Log out</a>
</p>


<?php
include 'templates/footer.phtml'; 
?>