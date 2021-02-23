<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Identifier\Component;

use GrizzIt\Identifier\Common\IdGeneratorInterface;

class UlidGenerator implements IdGeneratorInterface
{
    /**
     * Crockford's Base32
     *
     * @var string
     */
    public const CROCKFORD_BASE32 = '0123456789ABCDEFGHJKMNPQRSTVWXYZ';

    /**
     * The last time that was used to generate a ULID.
     *
     * @var int
     */
    private ?int $lastTime = null;

    /**
     * The last randomized array.
     *
     * @var int[]
     */
    private array $lastRandom = [];

    /**
     * Generates a ULID.
     *
     * @return string
     */
    public function generate(): string
    {
        $chars = '';
        $currentTime = $this->getCurrentTime();

        for ($i = 0; $i < 10; $i++) {
            $mod = $currentTime % 32;
            $chars = static::CROCKFORD_BASE32[$mod] . $chars;
            $currentTime = ($currentTime - $mod) / strlen(
                static::CROCKFORD_BASE32
            );
        }

        if ($currentTime !== $this->lastTime) {
            $this->lastTime = $currentTime;
            $this->lastRandom = [];
        }

        $this->ensureRandom();

        foreach ($this->lastRandom as $random) {
            $chars = $chars . static::CROCKFORD_BASE32[$random];
        }

        return $chars;
    }

    /**
     * Retrieves the current time in milliseconds.
     *
     * @return int
     */
    private function getCurrentTime(): int
    {
        return microtime(true) * 1000;
    }

    /**
     * Retrieves a set of random bytes.
     *
     * @return void
     */
    private function ensureRandom(): void
    {
        if ($this->lastRandom !== []) {
            for ($i = 15; $i >= 0 && $this->lastRandom[$i] === 31; $i--) {
                $this->lastRandom[$i] = 0;
            }

            if ($i !== 0) {
                $this->lastRandom[$i]++;

                return;
            }
        }

        $this->generateRandom();
    }

    /**
     * Generates a new set of random bytes.
     *
     * @return void
     */
    private function generateRandom(): void
    {
        $this->lastRandom = [];

        for ($i = 0; $i < 16; $i++) {
            $this->lastRandom[$i] = random_int(
                0,
                strlen(static::CROCKFORD_BASE32) - 1
            );
        }

        $this->lastRandom;
    }
}
