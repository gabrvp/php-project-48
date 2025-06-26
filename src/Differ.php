<?php

namespace Differ\Differ;

use function Differ\Parsers\parse;

function genDiff(string $pathToFile1, string $pathToFile2)
{
    $parsingFileContent1 = parse($pathToFile1);
    $parsingFileContent2 = parse($pathToFile2);
    
    $allKeys = array_unique(array_merge(array_keys($parsingFileContent1), array_keys($parsingFileContent2)));
    #Получили общий массив с ключами

    sort($allKeys);

    $result = ['{'];

    function formatValue($value): string
    {
        return var_export($value, true);
    }

    foreach ($allKeys as $key) {
        $value1 = $parsingFileContent1[$key] ?? null;
        $value2 = $parsingFileContent2[$key] ?? null;
        
        if ($value1 === $value2) {
            $result[] = "  $key:" . formatValue($value1);
        } else {
            if ($value1 !== null && $value2 === null) {
                $result[] = "- $key:" . formatValue($value1);
            }
            if ($value1 === null && $value2 !== null) {
                $result[] = "+ $key:" . formatValue($value2);
            }
            if ($value1 !== null && $value2 !== null) {
                $result[] = "- $key:" . formatValue($value1);
                $result[] = "+ $key:" . formatValue($value2);
            }
        }
    }
    $result[] = '}';
    return implode("\n", $result);
}