<?php
require_once 'connect.php';
//read file contents
$json_data = file_get_contents('../data/FLWAI8IN_newpets_1.json');

$resultArray = explode(PHP_EOL, $json_data);
//var_dump($json_data);
//echo $resultArray[2];
$length = count($resultArray);

for ($i=0; $i < $length; $i++) {
    $data = json_decode($resultArray[$i], true);
    $animalID = $data['animalID'];
    $status = $data['status'];
    $name = $data['name'];
    $species = $data['species'];
    $breed = $data['breed'];
    $sex = $data['sex'];
    $size = $data['size'];
    $description = $data['descriptionPlain'];
    $description = preg_replace("/[^A-Za-z0-9 ]/", '', $description);
    $picURL = stripslashes($data['pictures'][0]['originalUrl']);

    //echo "Pic: " . $picURL . "<br> ";
    $query = "INSERT INTO available VALUES(NULL, '$animalID', '$status', '$name', '$species', '$breed', '$sex', '$size', '$description', '$picURL')";
    $result = mysql_query($query);

    if (!$result) {
        die($i . " " . $resultArray[$i] . " DB Access failed: " . mysql_error());
       }
}

?>