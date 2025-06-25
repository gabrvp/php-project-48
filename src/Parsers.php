<?php

namespace Differ\Parsers;

function printer($pathToFile1, $pathToFile2)
{
    $fileContent1 = file_get_contents($pathToFile1);
    $fileContent2 = file_get_contents($pathToFile2);

    $data1 = json_decode($fileContent1);
    $data2 = json_decode($fileContent2);

    var_dump($data1);
    echo "\n";
    var_dump($data2);
}