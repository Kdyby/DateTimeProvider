<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Kdyby\DateTimeProvider\Providers;

use DateInterval;
use DateTimeImmutable;
use DateTimeZone;

/**
 * Base implementation for DateTime-based providers.
 */
abstract class AbstractProvider implements \Kdyby\DateTimeProvider\DateTimeProviderInterface
{

	use \Kdyby\StrictObjects\Scream;

	/**
	 * @var \DateTimeImmutable
	 */
	protected $prototype;

	/**
	 * Cached date immutable object (time 0:00:00)
	 *
	 * @var \DateTimeImmutable|NULL
	 */
	protected $date;

	public function __construct(DateTimeImmutable $prototype)
	{
		$this->prototype = $prototype;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getDate(): DateTimeImmutable
	{
		if ($this->date === NULL) {
			$this->date = $this->prototype->setTime(0, 0, 0);
		}

		return $this->date;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getTime(): DateInterval
	{
		return new DateInterval(sprintf('PT%dH%dM%dS', $this->prototype->format('G'), $this->prototype->format('i'), $this->prototype->format('s')));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getDateTime(): DateTimeImmutable
	{
		return $this->prototype;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getTimezone(): DateTimeZone
	{
		return $this->prototype->getTimezone();
	}

}