<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 01.09.2018
 * Time: 18:45
 */

require_once("index.php");

for ($j=0; $j<31; $j++) {
    for ($i=$j+1; $i<32; $i++) {
        echo $data[$j]['name']. " - " . $data[$i]['name'] . ":";
        $thescore = match($j, $i);
        echo $thescore[0] . " - " . "$thescore[1]" . "<br>";
    }
}
