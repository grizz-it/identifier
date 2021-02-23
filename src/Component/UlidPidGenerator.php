<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Identifier\Component;

class UlidPidGenerator extends UlidGenerator
{
    /**
     * Generates a PID extended ULID.
     *
     * @return string
     */
    public function generate(): string
    {
        $ulid = parent::generate();

        $pid = getmypid();
        $chars = '';
        for ($i = 0; $i < 4; $i++) {
            $mod = $pid % 32;
            $chars = static::CROCKFORD_BASE32[$mod] . $chars;
            $pid = ($pid - $mod) / strlen(static::CROCKFORD_BASE32);
        }

        return substr($ulid, 0, 10) . $chars . substr($ulid, 10);
    }
}
