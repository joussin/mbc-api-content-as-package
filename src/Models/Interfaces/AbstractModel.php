<?php

namespace MbcApiContent\Models\Interfaces;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model implements ModelInterface
{
    use HasFactory;


    public function createdEventCallback() : mixed
    {
        return null;
    }
    public function updatedEventCallback() : mixed
    {
        return null;
    }
    public function deletedEventCallback() : mixed
    {
        return null;
    }
    public function restoredEventCallback() : mixed
    {
        return null;
    }
    public function forceDeletedEventCallback(): mixed
    {
        return null;
    }
}
