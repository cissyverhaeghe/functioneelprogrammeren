<?php
// fetch information from database
require_once "config.php";
require_once "html_components.php";

$sql = "select * from images";
$result = GetData($sql);

//hoofd printen en jumbo
PrintHead();
PrintBody();
PrintJumbo("De ALLERleukste plekken in Europa", "da ga nu toch ni me corona");
PrintNavBar();
?>


<div class="container">
    <div class="row">
        <?php
        //show result (if there is any)
        if ($result->num_rows > 0) {
            //output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-sm-4'>
            <h3>$row[img_title]</h3>
            <p>$row[img_width] x $row[img_height] pixels</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            <img src='../images/$row[img_filename]' width='300' height='200'/></br>
            <a href='stad_form.php?img_id=$row[img_id]'>Meer info</a>
            </div>";
            }
        }
        else
        {
            echo "no records found";
        }
        //$conn->close(); test
        ?>
    </div>
</div>
</body>
</html>