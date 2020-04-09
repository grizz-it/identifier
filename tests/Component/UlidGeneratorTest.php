<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Identifier\Tests\Component;

use PHPUnit\Framework\TestCase;
use GrizzIt\Identifier\Component\UlidGenerator;

/**
 * @coversDefaultClass GrizzIt\Identifier\Component\UlidGenerator
 */
class UlidGeneratorTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::generate
     * @covers ::getCurrentTime
     * @covers ::ensureRandom
     * @covers ::generateRandom
     */
    public function testGenerate(): void
    {
        $subject = new UlidGenerator();
        $result = $subject->generate();
        $this->assertEquals(26, strlen($result));
        $this->assertNotEquals($result, $subject->generate());
    }
}
