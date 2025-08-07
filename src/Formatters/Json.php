<?php

declare(strict_types=1);

namespace Differ\Formatters\Json;

function jsonFormat(array $diff): string
{
    $result = json_encode($diff, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
    return $result;
}
