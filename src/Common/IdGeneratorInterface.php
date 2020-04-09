<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Identifier\Common;

interface IdGeneratorInterface
{
    /**
     * Generates an ID.
     *
     * @return string
     */
    public function generate(): string;
}
