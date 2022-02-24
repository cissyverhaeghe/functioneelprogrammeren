<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "lib/autoload.php";

PrintHead();
PrintJumbo("OO Programmeren");

$configuration = array(
    'db_dsn' => 'mysql:host=localhost;dbname=steden',
    'db_user' => 'root',
    'db_pass' => 'root',
);

$container = new Container($configuration);
$cityLoader = $container->getCityLoader();
$cityId = isset($_GET['img_id']) ? ($_GET['img_id']) : null;
$city = $cityLoader->findOneById($cityId);
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