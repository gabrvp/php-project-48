<?php

namespace Differ\tests\GenDiffTest;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

use function Differ\Differ\genDiff;

class GenDiffTest extends TestCase
{
    #[DataProvider('diffDataProvider')]
    public function testGenDiff(string $file1, string $file2, string $format, string $expectedFile): void
    {
        $fixture1 = $this->getFixturePath($file1);
        $fixture2 = $this->getFixturePath($file2);
        $expectedPath = $this->getFixturePath($expectedFile);

        $this->assertFileExists($fixture1);
        $this->assertFileExists($fixture2);
        $this->assertFileExists($expectedPath);

        $expected = file_get_contents($expectedPath);
        $actual = genDiff($fixture1, $fixture2, $format);

        $this->assertEquals($expected, $actual);
    }

    public static function diffDataProvider(): array
    {
        return [
            'JSON stylish format' => [
                'file1.json',
                'file2.json',
                'stylish',
                'expectedStylish'
            ],
            'YAML stylish format' => [
                'file1.yml',
                'file2.yaml',
                'stylish',
                'expectedStylish'
            ],
            'JSON plain format' => [
                'file1.json',
                'file2.json',
                'plain',
                'expectedPlain'
            ],
            'YAML plain format' => [
                'file1.yml',
                'file2.yaml',
                'plain',
                'expectedPlain'
            ],
            'JSON json format' => [
                'file1.json',
                'file2.json',
                'json',
                'expectedJson'
            ],
            'YAML json format' => [
                'file1.yml',
                'file2.yaml',
                'json',
                'expectedJson'
            ]
        ];
    }

    private function getFixturePath(string $filename): string
    {
        return __DIR__ . '/fixtures/' . $filename;
    }
}
