<?php

namespace MbcApiContent\Entity;

use Illuminate\Database\Eloquent\Model;

class PageContent extends BaseEntity
{

    public int $id;

    public ?int $page_id;

    public ?string $name;

    public ?string $content;

    public string $created_at;

    public string $updated_at; //\DateTimeInterface


}