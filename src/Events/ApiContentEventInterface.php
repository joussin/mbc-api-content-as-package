<?php

namespace MbcApiContent\Events;

interface ApiContentEventInterface
{
    public function callback(mixed $callbackArgs = null) : mixed;
}