<?php

namespace Spatie\Export\Jobs;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RuntimeException;
use Spatie\Export\Destination;
use Spatie\Export\Traits\NormalizedPath;
use MbcApiContent\App\Entity\Route as RouteEntity;

class ExportPath
{
    use NormalizedPath;

    /**
     * @var RouteEntity
     */
    protected $path;


    public function __construct(RouteEntity $path)
    {
        $this->path = $path;

    }

    public function handle(Kernel $kernel, Destination $destination, UrlGenerator $urlGenerator)
    {
        $response = $kernel->handle(
            Request::create($urlGenerator->to($this->path->getUri()))
        );

        if ($response->status() !== 200) {
            throw new RuntimeException("Path [{$this->path->getUri()}] returned status code [{$response->status()}]");
        }
        $staticDocName = $this->path->getStaticDocName() ?? 'index.html';
        $pathNormalized = $this->normalizePath($this->path->getStaticUri(), $staticDocName);
        $destination->write($pathNormalized, $response->content());
    }
}
