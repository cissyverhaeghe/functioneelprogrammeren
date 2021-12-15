<?php

//function to print the head of the page
function PrintHead()
{
    $content = file_get_contents("./templates/head.html");
    echo $content;
}


//function to print class jumbotron
function PrintJumbo($header_text,$paragraph_text){
    $content = file_get_contents("./templates/jumbo.html");
    $new_content = str_replace( "@@header@@", "$header_text", $content);
    print str_replace( "@@paragraph@@", "$paragraph_text", $new_content);
}

//function to print body tag
function PrintBody(){
    echo "<body>";
}