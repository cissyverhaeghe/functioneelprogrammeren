<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Leuke plekken in Europa" ,
                        $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
PrintNavbar();
//PrintMessages();


$url_owm = "https://api.openweathermap.org/data/2.5/weather";
$cissy_owm_key = "99d344fc772c31271136fc8a29770834";

$stad = "Brussel";
$lang = "nl";

$url = "$url_owm?q=$stad&lang=$lang&appid=$cissy_owm_key";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);

$response = json_decode($curl_response);


//
//$row['description'] = $response->weather[0]->description;
//$row['temp'] = $response->main->temp;
//$row['humidity'] = $response->main->humidity;

var_dump($response);

$data[$key] = $row;

?>

<div class="container">
    <div class="row">

<?php
//    testje foutmelding
//    $_SESSION["errors"][] = "Geen fouten!";

    $steven = "Steven";
    $container->getLogger()->Log("DIT BERICHT KOMT UIT STEDEN.PHP");
    $container->getLogger()->Log( "De variabele steven: " . var_export($steven, true));


    //toon messages als er zijn
    $container->getMessageService()->ShowErrors();
    $container->getMessageService()->ShowInfos();

    //get data
    $data = $container->getDBManager()->GetData( "select * from images" );

    //get template
    $template = file_get_contents("templates/column.html");

    //merge
    $output = MergeViewWithData( $template, $data );
    print $output;
?>

    </div>
</div>

</body>
</html>