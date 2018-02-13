<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

declare(strict_types=1);

namespace Kdyby\DateTimeProvider\Provider;

use DateTimeImmutable;
use Kdyby\DateTimeProvider\DateProviderInterface;
use Kdyby\DateTimeProvider\DateTimeProviderInterface;
use Kdyby\DateTimeProvider\TimeProviderInterface;
use Kdyby\DateTimeProvider\TimeZoneProviderInterface;
use Kdyby\StrictObjects\Scream;

class CurrentProvider implements
    DateTimeProviderInterface,
    DateProviderInterface,
    TimeProviderInterface,
    TimeZoneProviderInterface
{
    use ProviderTrait;
    use Scream;

    /**
     * {@inheritdoc}
     */
    public function getPrototype() : DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
