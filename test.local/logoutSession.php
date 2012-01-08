
<?php

session_name('Longsvisit');           
session_start();

$_SESSION = array();

//session_destroy();
unset ($_SESSION);
            
ini_set('display_errors', true);
error_reporting(E_ALL);

define("TITLE", "Logout using session");

include('templates/header.phtml');

?>

<p> You are now logged out.</p>

<?php
include 'templates/footer.phtml'; 
?>