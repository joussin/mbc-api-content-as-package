<?php

namespace MbcApiContent\App\Events;

interface ApiContentEventInterface
{
    public function callback() : mixed;
}