<?php

declare(strict_types=1);

namespace Mammatus\Tests\Http\Server\Webroot;

use Mammatus\Http\Server\Webroot\WebrootPath;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class WebrootPathTest extends TestCase
{
    #[Test]
    final public function path(): void
    {
        $path = '/tmp';

        $webroot = new WebrootPath($path);

        self::assertSame($path, $webroot->path());
    }
}
