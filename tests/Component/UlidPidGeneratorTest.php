<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Identifier\Tests\Component;

use PHPUnit\Framework\TestCase;
use GrizzIt\Identifier\Component\UlidPidGenerator;

/**
 * @coversDefaultClass GrizzIt\Identifier\Component\UlidPidGenerator
 * @covers GrizzIt\Identifier\Component\UlidGenerator
 */
class UlidPidGeneratorTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::generate
     */
    public function testGenerate(): void
    {
        $subject = new UlidPidGenerator();
        $result = $subject->generate();
        $this->assertEquals(30, strlen($result));
        $this->assertNotEquals($result, $subject->generate());
    }
}
