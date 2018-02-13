# DateTimeProvider library

This library consists of multiple accessors to access current date, time, date & time or timezone information.

## Provider API

There are four provider interfaces available.
They're meant for convenience, specific use case and easy unit testing.

* `Kdyby\DateTimeProvider\DateTimeProviderInterface`
  * provides current date & time, most common use case
  * returns a `DateTimeImmutable` instance
* `Kdyby\DateTimeProvider\DateProviderInterface`
  * provides current date
  * returns a `DateTimeImmutable` instance without time (as in, time will always be `00:00:00.000000`)
* `Kdyby\DateTimeProvider\TimeProviderInterface`
  * provides current time
  * returns a `DateInterval` instance containing hour, minute, second and microsecond
* `Kdyby\DateTimeProvider\DateTimeZoneProviderInterface`
  * provides current time zone
  * returns a `DateTimeZone` instance, matching the time zone of current time

## Time source

Providers implement all the above interfaces (don't rely on it, it's an implementation detail).
Each provides different way to obtain the time. There are three of them:

* `Kdyby\DateTimeProvider\Provider\ConstantProvider`
  * given a `DateTimeImmutable` instance, it will always return the same time for every future call
  * useful for HTTP requests or when time should be kept same
* `Kdyby\DateTimeProvider\Provider\CurrentProvider`
  * whenever asked for, it will return the current time obtained from the system
  * useful i.e. for long-running proceses or when time precision is required
* `Kdyby\DateTimeProvider\Provider\MutableProvider`
  * same as constant provider, but the time prototype could be explicitly changed
  * useful for testing

And there is also a helper factory:
* `Kdyby\DateTimeProvider\Provider\ConstantProviderFactory`
  * given a date & time as an object or integer, returns a `ConstantProvider`
