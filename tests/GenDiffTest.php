<?php

namespace Differ\tests\GenDiffTest;

use PHPUnit\Framework\TestCase;

use function Differ\Differ\genDiff;

class GenDiffTest extends TestCase
{
    public function testGenDiff()
    {
        $pathToFile1 = 'tests/fixtures/file1.json';
        $pathToFile2 = 'tests/fixtures/file2.json';
        $actual = genDiff($pathToFile1, $pathToFile2);
        $expected = <<<EOT
{
   - follow:false
   host:'hexlet.io'
   - proxy:'123.234.53.22'
   - timeout:50
   + timeout:20
   + verbose:true
}
EOT;
        $this->assertEquals($expected, $actual);
    }
}
