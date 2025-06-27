<?php

namespace Differ\tests\GenDiffTest;

use PHPUnit\Framework\TestCase;

use function Differ\Differ\genDiff;

class GenDiffTest extends TestCase
{
    private const RESULT = <<<EOT
{
   - follow:false
     host:'hexlet.io'
   - proxy:'123.234.53.22'
   - timeout:50
   + timeout:20
   + verbose:true
}
EOT;
    public function testJsonDiff()
    {
        $pathToFile1 = 'tests/fixtures/file1.json';
        $pathToFile2 = 'tests/fixtures/file2.json';
        $actual = genDiff($pathToFile1, $pathToFile2);
        $this->assertSame(self::RESULT, $actual);
    }

    public function testYamlDiff()
    {
        $pathToFile1 = 'tests/fixtures/file1.yml';
        $pathToFile2 = 'tests/fixtures/file2.yaml';
        $actual = genDiff($pathToFile1, $pathToFile2);
        $this->assertSame(self::RESULT, $actual);
    }
}
