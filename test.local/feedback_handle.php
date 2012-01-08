<!doctype html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title> Your submitted feedback </title>        
    </head>
    
    <body>
        <?php
                    
            ini_set('display_errors', true);            
            error_reporting(E_ALL);           
            
            
            $title = $_POST['tite'];
            $name = $_POST['name'];
            $rate = $_POST['rate'];
            $comment = $_POST['comment'];
            
            print "
            <p>
            Thank you $title $name for submitting your comment.
            </p>
            <p>
            You found this website to be '$rate' and added:<br /> $comment.
            </p>
            ";        
        ?>
    </body>
        
</html>