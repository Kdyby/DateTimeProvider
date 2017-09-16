<?php

/**
 * Test: Kdyby\DateTimeProvider\CurrentDateTimeProvider.
 *
 * @testCase KdybyTests\DateTimeProvider\CurrentDateTimeProviderTest
 */

declare(strict_types = 1);

namespace KdybyTests\DateTimeProvider;

use DateTimeImmutable;
use Kdyby\DateTimeProvider\Provider\CurrentDateTimeProvider;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

class CurrentDateTimeProviderTest extends \Tester\TestCase
{

	public function testNotConstant(): void
	{
		$tp = new CurrentDateTimeProvider();
		$date = $tp->getDate();
		$datetime = $tp->getDateTime();
		$time = $tp->getTime();
		$timezone = $tp->getTimeZone();

		sleep(2);

		Assert::type(DateTimeImmutable::class, $datetime);
		Assert::same('00:00:00.000000', $date->format('H:i:s.u'));
		Assert::notEqual($datetime, $tp->getDateTime());
		Assert::notEqual($time->format('%h:%i:%s.%f'), $tp->getTime()->format('%h:%i:%s.%f'));
		Assert::same($timezone->getName(), $tp->getTimeZone()->getName());
	}

	public function testTimezones(): void
	{
		date_default_timezone_set('Europe/Prague');

		$tp = new CurrentDateTimeProvider();
		Assert::same('Europe/Prague', $tp->getTimeZone()->getName());

		date_default_timezone_set('Europe/London');

		$tp = new CurrentDateTimeProvider();
		Assert::same('Europe/London', $tp->getTimeZone()->getName());
	}

}

(new CurrentDateTimeProviderTest())->run();
