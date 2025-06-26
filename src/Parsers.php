<?php

namespace Differ\Parsers;

function getFileContent(string $pathToFile)
{
    $fileContent = file_get_contents($pathToFile);
    if ($fileContent !== false) {
        return $fileContent;
    }
    throw new \Exception('File not found', 901);
}

function parse(string $pathToFile)
{
    $fileContent = getFileContent($pathToFile, true);
    $parsingFileContent = json_decode($fileContent, true);
    return $parsingFileContent;
}
