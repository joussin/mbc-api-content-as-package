<?php

namespace MbcApiContent\App\Events;


class StaticFilesChangedEvent extends ApiContentEvent
{

    protected string $filename;
    protected string $action;

    public function __construct(string $filename, string $action)
    {
        $this->filename = $filename;
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }



    public function callback() : mixed
    {
        return null;
    }
}
