<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$public_access = false;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo($title = "Waterwegen in Europa");
PrintNavbar();

?>

<div class="container">
    <div class="row">

        <?php
        //toon messages als er zijn
        $ms->ShowErrors();
        $ms->ShowInfos();

        //get data
        $data = $dbm->GetData("select * from water");

        //get template
        $template = file_get_contents("templates/column_water.html");

        //merge
        $output = MergeViewWithData($template, $data);
        print $output;
        ?>

    </div>
</div>

</body>
</html>