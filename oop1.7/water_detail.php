<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$public_access = false;

require_once "lib/autoload.php";

PrintHead();

//get the water id via the url
$waterId = isset($_GET['wat_id']) ? ($_GET['wat_id']) : null;

//create a waterbody object
$waterBody = $container->getWaterLoader()->findOneById($waterId);

//print the name and location in the title if waterBody is a river
$waterBodyName = $waterBody->getWatName();
if ($waterBody->getType() === "Rivier") {
    PrintJumbo($waterBodyName, "Locatie: " . $waterBody->getWatLocation());
} //else print the name and the surface in the title
else PrintJumbo($waterBodyName, "Oppervlakte: " . number_format($waterBody->getWatSurface()) . " km²");

?>

<div class="container">
    <div class="row">

        <?php

        //get template
        $template = file_get_contents("templates/column_water_detail.html");
        //merge template with data from the waterbody object
        $output = $waterBody->replaceValues($template);
        //print output
        print $output;

        ?>

    </div>
</div>

</body>
</html>