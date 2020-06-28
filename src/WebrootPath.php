<?php declare(strict_types=1);

namespace Mammatus\Http\Server\Webroot;

use Mammatus\Http\Server\Configuration\Webroot;

final class WebrootPath implements Webroot
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function path(): string
    {
        return $this->path;
    }
}
