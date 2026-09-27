# Webroot implementations for the HTTP server

![Continuous Integration](https://github.com/mammatusphp/http-server-webroot/workflows/Continuous%20Integration/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/mammatus/http-server-webroot/v/stable.png)](https://packagist.org/packages/mammatus/http-server-webroot)
[![Total Downloads](https://poser.pugx.org/mammatus/http-server-webroot/downloads.png)](https://packagist.org/packages/mammatus/http-server-webroot/stats)
[![Type Coverage](https://shepherd.dev/github/mammatusphp/http-server-webroot/coverage.svg)](https://shepherd.dev/github/mammatusphp/http-server-webroot)
[![License](https://poser.pugx.org/mammatus/http-server-webroot/license.png)](https://packagist.org/packages/mammatus/http-server-webroot)

Concrete types for the [`Webroot`](https://github.com/MammatusPHP/http-server-contracts/blob/main/src/Configuration/Webroot.php) marker interface from [mammatus/http-server-contracts](https://github.com/MammatusPHP/http-server-contracts). Return one from [`Vhost::webroot()`](https://github.com/MammatusPHP/http-server-contracts/blob/main/src/Configuration/Vhost.php); [mammatus/http-server](https://github.com/MammatusPHP/http-server) passes a filesystem directory into generated ReactPHP servers only when the value is a `WebrootPath`.

# Install

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `^`.

```
composer require mammatus/http-server-webroot
```

# Implementations

This package provides the following classes:

## NoWebroot

Empty implementation of `Webroot`. Use it when the vhost serves only dynamic routes and handlers (no static files). Generated server configuration receives an empty webroot path.

```php
use Mammatus\Http\Server\Configuration\Vhost;
use Mammatus\Http\Server\Configuration\Webroot;
use Mammatus\Http\Server\Webroot\NoWebroot;

final class FrontendVhost implements Vhost
{
    public static function webroot(): Webroot
    {
        return new NoWebroot();
    }

    // port(), name(), maxConcurrentRequests(), middleware(), ...
}
```

Example: [FrontendVhost](https://github.com/MammatusPHP/http-server/blob/main/etc/dev-app/FrontendVhost.php).

## WebrootPath

Readonly value object holding a directory path. Call `path()` to read the absolute or relative filesystem location served as static content.

```php
use Mammatus\Http\Server\Configuration\Vhost;
use Mammatus\Http\Server\Webroot\WebrootPath;

final class HealthCheckVhost implements Vhost
{
    public static function webroot(): WebrootPath
    {
        return new WebrootPath(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public');
    }

    // port(), name(), maxConcurrentRequests(), middleware(), ...
}
```

Example: [HealthCheckVhost](https://github.com/MammatusPHP/healthz-vhost/blob/main/src/HealthCheckVhost.php). Wiring in the server plugin: [Collector](https://github.com/MammatusPHP/http-server/blob/main/src/Composer/Collector.php).

# License

The MIT License (MIT)

Copyright (c) 2026 Cees-Jan Kiewiet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
