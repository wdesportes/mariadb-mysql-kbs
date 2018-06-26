<?php
declare(strict_types = 1);
$files = glob(__DIR__."/../data/mariadb-*.json");

$variables = array();

$nbr = 0;
foreach ($files as $file) {
    $data = json_decode((string) file_get_contents($file));
    if (isset($data->data) === false) {
        continue;
    } else {
        $data = $data->data;
    }

    foreach ($data as $doc) {
        if (in_array($doc->name, $variables) == false) {
            array_push($variables, $doc->name);
        }
    }
    $nbr += count($data);
}
echo "NBR: ".$nbr."\r\n";
echo "NBR_UNIQUE: ".count($variables)."\r\n";

//file_put_contents(__DIR__."/../data/mariadb-names.json", json_encode($variables));
//file_put_contents(__DIR__."/../data/mariadb-names.raw", implode(",", $variables));
