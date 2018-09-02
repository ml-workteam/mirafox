<?php

require_once("data.php");

function match($c1, $c2){
    global $data;
    if (!(is_integer($c1) && is_integer($c2))) {
        return array(-1,-1);
    }

    if (!(($c1 >= 0) && $c1 <count($data)) or !(($c2 >= 0) && $c2 <count($data))) {
        return array(-1,-1);
    }

    if ($c1 == $c2) {
        return array(-1,-1);
    }

    $lambda1 = ($data[$c1]['goals']['scored'] + $data[$c2]['goals']['skiped'])/($data[$c1]['games']+$data[$c2]['games']);
    $lambda2 = ($data[$c2]['goals']['scored'] + $data[$c1]['goals']['skiped'])/($data[$c1]['games']+$data[$c2]['games']);
    return array(getPoisson($lambda1), getPoisson($lambda2));
}

function getPoisson($lambda) {
    $l = exp(-$lambda);
    $p = 1.0;
    $k = 0;

    do {
      $k++;
      $p *= rand(0,1);
    } while ($p > $l);

    return $k - 1;
}