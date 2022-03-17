<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "lib/autoload.php";

PrintHead();
PrintJumbo("Water detail");

$waterId = isset($_GET['wat_id']) ? ($_GET['wat_id']) : null;
$waterBody = $container->getWaterLoader()->findOneById($waterId);
?>

<div class="container">
    <div class="row">

        <?php

        //get template
        $template = file_get_contents("templates/column_full.html");
        $output = $city->replaceValues($template);
        $new_output = $city->getTitle($output);
        print $new_output;


        ?>

    </div>
</div>

</body>
</html>