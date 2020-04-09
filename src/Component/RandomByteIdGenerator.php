<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Identifier\Component;

use GrizzIt\Identifier\Common\IdGeneratorInterface;

class RandomByteIdGenerator implements IdGeneratorInterface
{
    /** @var int */
    private $bytes;

    /**
     * Constructor.
     *
     * @param int $bytes The amount of bytes used for the ID.
     */
    public function __construct(int $bytes = 16)
    {
        $this->bytes = $bytes;
    }

    /**
     * Generates an ID based on random bytes.
     *
     * @return string
     */
    public function generate(): string
    {
        return bin2hex(random_bytes($this->bytes));
    }
}
