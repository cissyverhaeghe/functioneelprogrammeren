<?php
require_once "config.php";

$sql = "select * from images";


if ($_GET["img_id"] > "") {
    $sql .= " where img_id like " . $_GET["img_id"];
    //var_dump($sql);
}
$result = GetData($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail stad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

</head>
<style>
    .information{
        padding: 25px;
    }
    img {
        display: block;
        height: auto;
        width: 75%;

    }

</style>
<body>

<div class="jumbotron text-center">
    <h1>Detail Stad</h1>
</div>


<?php
//show result (if there is any)
if ($result->num_rows > 0) {
    //output data of each row
    while ($row = $result->fetch_assoc()) {
        echo " <div class='information'>
            <h3>$row[img_title]</h3>
            <p>filename: $row[img_filename]</p>
            <p>$row[img_width] x $row[img_height] pixels</p>
            <img src='./images/$row[img_filename]'/></br>
            <a href='steden2.php'>Terug naar overzicht</a>
            </div>";

        //alle afbeeldingen overlopen, en kolom opmaken met titel en afbeelding
    }
} else {
    echo "no records found";
}

?>


</body>
</html>