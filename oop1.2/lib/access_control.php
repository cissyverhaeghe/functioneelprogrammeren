<?php

if (!$public_access){
    if($_SESSION['user']){
        $public_access = true;
    }
    else {
        header( "Location: ./no_access.php");
    }
}