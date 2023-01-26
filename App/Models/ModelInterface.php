<?php

namespace MbcApiContent\App\Models;

interface ModelInterface
{

    public function createdEventCallback() : mixed;

    public function updatedEventCallback() : mixed;

    public function deletedEventCallback() : mixed;

    public function restoredEventCallback() : mixed;

    public function forceDeletedEventCallback() : mixed;
}