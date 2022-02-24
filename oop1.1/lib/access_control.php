<?php

if (!$public_access){
    if($_SESSION['usr_voornaam']){
        $public_access = true;
    }
    else {
        header( "Location: ./no_access.php");
    }
}