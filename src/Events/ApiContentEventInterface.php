<?php

namespace MbcApiContent\src\Events;

interface ApiContentEventInterface
{
    public function callback(mixed $callbackArgs = null) : mixed;
}