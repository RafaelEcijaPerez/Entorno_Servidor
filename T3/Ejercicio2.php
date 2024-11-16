<?php 
function create_logo() 
{  
    return '<img src="img/logo.png" alt="Logo" />';
}

function create_copyright_notice() 
{ 
    $year = date('Y'); 
    $message = '&copy;' . $year.' The Candy Store'; 
    return $message; 
} 
?> 
<html> 
    <head> 
        <title>Functions with Parameters</title> 
        <link rel="stylesheet" href="css/styles.css"> 
    </head> 
    <body> 
        <header> 
            <h1><?= create_logo() ?>The Candy Store</h1> 
        </header> 

        <article> 
            <h2>Welcome to The Candy Store</h2> 
        </article> 

        <footer> 
            <?= create_logo() ?> 
            <?= create_copyright_notice() ?> 
        </footer>
    </body>
</html>