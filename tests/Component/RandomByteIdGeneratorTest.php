<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Identifier\Tests\Component;

use PHPUnit\Framework\TestCase;
use GrizzIt\Identifier\Component\RandomByteIdGenerator;

/**
 * @coversDefaultClass GrizzIt\Identifier\Component\RandomByteIdGenerator
 */
class RandomByteIdGeneratorTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::generate
     *
     * @dataProvider byteProvider
     */
    public function testGenerate(int $bytes, int $expectedLength): void
    {
        $subject = new RandomByteIdGenerator($bytes);
        $result = $subject->generate();
        $this->assertEquals($expectedLength, strlen($result));
        $this->assertNotEquals($result, $subject->generate());
    }

    /**
     * @return array
     */
    public function byteProvider(): array
    {
        return [
            [
                16,
                32
            ],
            [
                32,
                64
            ]
        ];
    }
}
