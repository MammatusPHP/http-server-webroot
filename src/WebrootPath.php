<?php

declare(strict_types=1);

namespace Mammatus\Http\Server\Webroot;

use Mammatus\Http\Server\Configuration\Webroot;

final readonly class WebrootPath implements Webroot
{
    public function __construct(private string $path)
    {
    }

    public function path(): string
    {
        return $this->path;
    }
}
