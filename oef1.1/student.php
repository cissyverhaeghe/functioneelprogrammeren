<?php
$student = [
    "voornaam" => "Jan",
    "naam" => "Janssens",
    "straat" => "Oude baan",
    "huisnr" => "22",
    "postcode" => 2800,
    "gemeente" => "Mechelen",
    "geboortedatum" => "14/05/1991",
    "telefoon" => "015 24 24 26",
    "e-mail" => "jan.janssens@gmail.com"
];

print "<h1>Student</h1>"."\n"."<table>"."\n";

function StudentToTable($lijst)
{
    foreach ($lijst as $gegeven => $data) {
        print "<tr><td>".ucfirst($gegeven)."</td><td>".$data."</tr></td>"."\n";
    }
}
StudentToTable($student);
print '</table>';
?>