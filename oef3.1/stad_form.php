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
PrintBody();
PrintJumbo("haha dit is een stad","");

?>
<!-- styling -->
<style>
    .information, form {
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
        echo
        "<form id='mainform' name='mainform' method='post' action='save.php'>
    <div class='form-group row'>
        <label for='staticImgID' class='col-sm-2 col-form-label'>ID</label>
        <div class='col-sm-10'>
            <input type='text' readonly class='form-control-plaintext' id='img_id' name='img_id' value='$row[img_id]'>
        </div>
    </div>
    <div class='form-group row'>
        <label for='inputTitle' class='col-sm-2 col-form-label'>Title</label>
        <div class='col-sm-10'>
            <input type='text' class='form-control' id='img_title' name='img_title' placeholder='$row[img_title]'>
        </div>
    </div>
    <div class='form-group row'>
        <label for='inputFilename' class='col-sm-2 col-form-label'>Filename</label>
        <div class='col-sm-10'>
            <input type='text' class='form-control' id='img_filename' name='img_filename' placeholder='$row[img_filename]'>
        </div>
    </div>
    <div class='form-group row'>
        <label for='inputWidth' class='col-sm-2 col-form-label'>Width</label>
        <div class='col-sm-10'>
            <input type='text' class='form-control' id='img_width' name ='img_width' placeholder='$row[img_width]'>
        </div>
    </div>
    <div class='form-group row'>
        <label for='inputHeight' class='col-sm-2 col-form-label'>Height</label>
        <div class='col-sm-10'>
            <input type='text' class='form-control' id='img_height' name='img_height' placeholder='$row[img_height]'>
        </div>
    </div>
    <input type='submit' class='btn btn-primary'>
</form>


 <div class='information'>
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