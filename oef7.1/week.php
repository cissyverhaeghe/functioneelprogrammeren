<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "lib/autoload.php";

PrintHead();
PrintJumbo($title = "Weekoverzicht");
PrintNavbar();
?>

<div class="container">

    <?php

    //get data

    PrintTableHead(); // print the head of the table


//make a loop to get the days of the week
    for ($i = 17; $i <= 23; $i++) {
        $data = GetData('SELECT * FROM taak WHERE taa_datum = "2022-01-' . $i . '"');
        $datum = mktime(0, 0, 0, 1, $i, 2022);
        $day = date("d/m/Y", $datum); //get the date in the right format
        $mydate = getdate($datum);
        $weekday = $mydate["weekday"]; //get the weekday from this date
        if ($data){ //if there is something for this date in the database, print these tasks
            $template = file_get_contents("templates/week_row_met_taak.html");
            $template = str_replace( "@weekday@", $weekday, $template );
            $template = str_replace( "@day@", $day, $template );
            $output = MergeViewWithData( $template, $data );
            print $output;
        }
        else PrintDayAndDate( $weekday, $day); // else print a row with no tasks
    }

    PrintTableEnd(); // print the end of the table

    ?>

</div>
</div>

</body>
</html>