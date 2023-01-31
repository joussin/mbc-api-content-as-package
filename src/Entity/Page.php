<?php

namespace MbcApiContent\Entity;


class Page  extends BaseEntity
{

    public int $id;

    public int $version;

    public ?string $name;

    public ?string $template_name;

    public ?int $route_id;

    public string $created_at;

    public string $updated_at; //\DateTimeInterface


}
