<?php
function PrintHead()
{
    $content = file_get_contents("./templates/head.html");
    echo $content;
}


