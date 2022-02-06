<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Geen toegang");
print "U hebt helaas geen toegang! Probeer eventueel <a href='login.php'>in te loggen</a>";
?>