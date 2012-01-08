<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

define("TITLE", "Welcome page");
include('templates/header.phtml');
?>

<?php
    $user =$_GET["name"];
    
    if ( !$user) {
        $user = 'user';
    }
    print " 
            <h2>
                Welcome $user !
            </h2>
            "
?>

<?php
include 'templates/footer.phtml'; 
?>