<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo();

$cityLoader = new CityLoader();
$cityId = isset($_GET['img_id']) ? ($_GET['img_id']) : null;
$city = new City
?>

<div class="container">
    <div class="row">

        <?php

        if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

        $rows = GetData( "select * from images where img_id=" . $_GET['img_id'] );

        //get template
        $template = file_get_contents("templates/column_full.html");

        //merge
        foreach ( $rows as $row )
        {
            $city->setImgFilename($row['img_filename']);
            $city->setImgTitle($row['img_title']);
            $city->setImgWidth($row['img_width']);
            $city->setImgHeight($row['img_height']);
            $city->setImgLanId($row['img_lan_id']);
            var_dump($city);
            $output = $template;


            foreach ($obj as $key => $value) {
                echo "$key => $value\n";
            }

            foreach( array_keys($row) as $field )
            {
                $output = str_replace( "@$field@", $row["$field"], $output );
            }
            print $output;
        }

        ?>

    </div>
</div>

</body>
</html>