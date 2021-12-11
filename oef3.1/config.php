<?php
function GetData($sql)
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "steden";

//Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed:. $conn->connect_error");
    }

//define and execute query
    $result = $conn->query($sql);
    return $result;
    return $conn;
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "steden";

function ExecSQL( $sql )
{

    // create connection
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // execute given query
    $result = $conn->query($sql);

    // close connection
    $conn->close();

    // return data array
    return $result;
}