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

use DateTime;
use DateTimeImmutable;
use DateTimeZone;
use Kdyby\DateTimeProvider\NotImplementedException;
use Kdyby\StrictObjects\Scream;
use function date_default_timezone_get;
use function is_numeric;
use function sprintf;

/**
 * Helper factory to create ConstantProvider from arbitrary input.
 */
class ConstantProviderFactory
{
    use Scream;

    /**
     * @param string|int|\DateTimeImmutable|\DateTime $dateTime
     */
    public function create($dateTime) : ConstantProvider
    {
        if ($dateTime instanceof DateTimeImmutable) {
            return new ConstantProvider($dateTime);
        }

        if ($dateTime instanceof DateTime) {
            return new ConstantProvider(DateTimeImmutable::createFromMutable($dateTime));
        }

        if (is_numeric($dateTime)) {
            return new ConstantProvider((new DateTimeImmutable(sprintf('@%.6f', $dateTime)))->setTimezone(new DateTimeZone(date_default_timezone_get())));
        }

        throw new NotImplementedException(sprintf(
            'Cannot process datetime in given format "%s"',
            $dateTime
        ));
    }
}
