<?php

namespace MbcApiContent\App\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApiContentEvent implements ApiContentEventInterface
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct()
    {
    }
}