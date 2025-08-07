<?php

namespace Differ\Formatters;

use function Differ\Formatters\Stylish\stylishFormat;

function makeFormat(array $diff, string $formatName): string
{
    return match ($formatName) {
        'stylish' => stylishFormat($diff),
        default => exit("Unknown format '{$formatName}'!\n")
    };
}
