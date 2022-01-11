<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Registratie", $subtitle = "" );
?>

<div class="container">
    <div class="row">

        <?php

            //get data
            $data = GetData( "select * from user" );
            $row = $data = [ 0 => [ "usr_voornaam" => "", "usr_naam" => "", "usr_email" => "", "usr_password" => "" ]];

            //add extra elements
            $extra_elements['csrf_token'] = GenerateCSRF( "stad_form.php"  );

            //get template
            $output = file_get_contents("templates/register.html");

            //merge
            $output = MergeViewWithData( $output, $data );
            $output = MergeViewWithExtraElements( $output, $extra_elements );
            $output = MergeViewWithErrors( $output, $errors );
            $output = RemoveEmptyErrorTags( $output, $data );

            print $output;
        ?>

    </div>
</div>

</body>
</html>