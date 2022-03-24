<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "lib/autoload.php";

PrintHead();
PrintJumbo($title = "Leuke plekken in Europa",
    $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!");
PrintNavbar();
//PrintMessages();


?>

<div class="container">
    <div class="row">

        <?php
        //    testje foutmelding
        //    $_SESSION["errors"][] = "Geen fouten!";

        $steven = "Steven";
        $container->getLogger()->Log("DIT BERICHT KOMT UIT STEDEN.PHP");
        $container->getLogger()->Log("De variabele steven: " . var_export($steven, true));


        //toon messages als er zijn
        $container->getMessageService()->ShowErrors();
        $container->getMessageService()->ShowInfos();

        //get data
        $data = $container->getDBManager()->GetData("select * from images");
        //Get the weather information in the $data array

        foreach ($data as $key => $row) {
            //Get Weather Data
            $url_owm = "https://api.openweathermap.org/data/2.5/weather";
            $cissy_owm_key = "99d344fc772c31271136fc8a29770834";

            $stad = $row['img_weather_location'];
            $lang = "nl";
            $units = "metric";

            $url = "$url_owm?q=$stad&lang=$lang&appid=$cissy_owm_key&units=$units";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $curl_response = curl_exec($curl);
            $response = json_decode($curl_response);


            //add the information to the array of the cities
            $row['description'] = $response->weather[0]->description;
            $row['temp'] = $response->main->temp;
            $row['humidity'] = $response->main->humidity;

            $data[$key] = $row;
        }

        //get template
        $template = file_get_contents("templates/column.html");

        //merge
        $output = MergeViewWithData($template, $data);
        print $output;
        ?>

    </div>
</div>

</body>
</html>