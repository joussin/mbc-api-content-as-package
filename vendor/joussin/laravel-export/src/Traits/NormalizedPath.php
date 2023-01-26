<?php

namespace Spatie\Export\Traits;

use Illuminate\Support\Str;

trait NormalizedPath
{
    protected function normalizePath(string $path, string $filename = 'index.html')
    {
        if (! Str::contains(basename($path), '.')) {
            $path .= '/' . $filename;
        }

        return ltrim($path, '/');
    }
}
