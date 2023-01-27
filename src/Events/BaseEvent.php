<?php

namespace MbcApiContent\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

abstract class BaseEvent implements ApiContentEventInterface
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}