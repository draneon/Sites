<!doctype html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title> Say your name </title>        
    </head>
    
    <body>
        <?php
                    
            ini_set('display_errors', true);            
            error_reporting(E_ALL);           
                                    
            $name = $_GET['name'];            
            
            print "
            <p>
            <span>
            Your name is $name!
            </span>
            
            </p>            
            ";        
        ?>

    </body>
        
</html>