<?php

//collect data
require_once "config.php";
require_once "html_components.php";

$sql = "select * from images";

//collect required information from URL
if ($_GET["img_id"] > "") {
    $sql .= " where img_id like " . $_GET["img_id"];
    //var_dump($sql);
}
$result = GetData($sql);

//print layout
PrintHead();
PrintJumbo("haha dit is een stad","");

?>
<!-- styling -->
<style>
    .information {
        padding: 25px;
    }

    img {
        display: block;
        height: auto;
        width: 75%;

    }

</style>


<?php
//show result (if there is any)
if ($result->num_rows > 0) {
    //output data
    while ($row = $result->fetch_assoc()) {
        echo " <div class='information'>
            <h3>$row[img_title]</h3>
            <p>filename: $row[img_filename]</p>
            <p>$row[img_width] x $row[img_height] pixels</p>
            <img src='../images/$row[img_filename]'/></br>
            <a href='steden2.php'>Terug naar overzicht</a>
            </div>";

    }
} else {
    echo "no records found";
}

?>
</body>
</html>