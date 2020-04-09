# GrizzIT Identifier - Identifier generators

Identifier generators are classes which can be used to generate unique
identifiers within an application. This package provides the following
implementations:

## [RandomByteIdGenerator](../../src/Component/RandomByteIdGenerator.php)
This generator generates an identifier based on the standard PHP `random_byte`
method and converts the byte value to a hexadecimal value. The constructor
value configures the amount of bytes used in the generation of the identifier.

```php
<?php

use GrizzIt\Identifier\Component\RandomByteIdGenerator;

$generator = new RandomByteIdGenerator(32);

$generator->generate();
```

## [UlidGenerator](../../src/Component/UlidGenerator.php)
This generator generates an identifier based on the ULID algorithm. This
algorithm guarantees a unique value every time it is generated. Because the
object is also aware of when the ID was generated, it can guarantee a unique
value.

```php
<?php

use GrizzIt\Identifier\Component\UlidGenerator;

$generator = new UlidGenerator();

$generator->generate();
```

## [UlidPidGenerator](../../src/Component/UlidPidGenerator.php)
This generator is a variation on the ULID algorithm with the addition that is
also uses the process ID to add more uniqueness to the identifier. This
algorithm variation is recommended for high volume multi-tenant systems, because
it also guarantees a unique identifier even when two processes generate an
identifier at exactly the same time.

```php
<?php

use GrizzIt\Identifier\Component\UlidPidGenerator;

$generator = new UlidPidGenerator();

$generator->generate();
```

## Further reading

[Back to usage index](index.md)
