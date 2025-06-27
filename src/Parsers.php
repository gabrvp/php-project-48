<?php

namespace Differ\Parsers;

use Symfony\Component\Yaml\Yaml;

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
    $fileExtension = pathinfo($pathToFile, PATHINFO_EXTENSION);
    switch ($fileExtension) {
        case 'json':
            $parsingFileContent = json_decode($fileContent, true);
            break;
        case 'yml':
        case 'yaml':
            $parsingFileContent = Yaml::parse($fileContent);
            break;
        default:
            throw new \Exception('The specified file type is not supported!');
    }
    return $parsingFileContent;
}
