
<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

define("TITLE", "See Font and Color customizations");

    // turn-on output buffer
    ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>
        <?php
        
            if (defined("TITLE")) {
                print TITLE;
            }
        else {
            print "Title is unknown.";
        }                    
        ?>        
    </title>
<!--  css code   -->
    <style type="text/css">
        body {
            <?php
                $fontColor = $_COOKIE['font_color'];
                $fontSize = $_COOKIE['font_size'];
                
                if (isset($fontColor)) {
                    print "color: #". htmlentities($fontColor).";\n";                    
                }
                else {
                    print "color: #000;";                    
                }
            
                if (isset($fontSize)) {
                    print "font-size: ". htmlentities($fontSize).";\n";                    
                }
                else {
                    print "font-size: medium;";                    
                }                
            ?>
        }
    </style>
    
       
</head>

<body>
    
        <div id="content">
            <p>
                Header content goes here..
            </p>   

        <p>
            The quick brown fox jumps over a little chicken.
        </p>

        <p><a href="customizeFontColor.php"> Change Font and Color </a></p>
        <p><a href="resetFontColor.php"> Reset Font and Color </a></p>

<?php
include 'templates/footer.phtml'; 
?>