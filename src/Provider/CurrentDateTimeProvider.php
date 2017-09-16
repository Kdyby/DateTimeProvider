<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Kdyby\DateTimeProvider\Provider;

use DateTimeImmutable;

class CurrentDateTimeProvider
	implements
		\Kdyby\DateTimeProvider\DateTimeProviderInterface,
		\Kdyby\DateTimeProvider\DateProviderInterface,
		\Kdyby\DateTimeProvider\TimeProviderInterface,
		\Kdyby\DateTimeProvider\TimeZoneProviderInterface
{

	use \Kdyby\DateTimeProvider\Provider\DateTimeProviderTrait;
	use \Kdyby\StrictObjects\Scream;

	/**
	 * {@inheritdoc}
	 */
	public function getPrototype(): DateTimeImmutable
	{
		return new DateTimeImmutable();
	}

}
