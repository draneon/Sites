<?php

    $fontsize = $_POST['font_size'];
    $fontcolor = $_POST['font_color'];
    
    if ( isset($fontsize, $fontcolor) ) {
        setcookie( 'font_size', $fontsize );
        setcookie( 'font_color', $fontcolor );
        
        $message = '
            <p>
    Preferences have been saved. <a href="viewPreferences.php"> Click here  </a> to see results.
            </p>
            ';        
    }        
?>

<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

define("TITLE", "Set Font and Color preferences");

include('templates/header.phtml');

if (isset($message))    {
    print $message;
}

include 'setFontColor.html';

include 'templates/footer.phtml'; 
?>