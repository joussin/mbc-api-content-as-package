<?php

namespace MbcApiContent\Entity\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface EntityInterface
{

    // pour EntityTrait::named()
    public function getName(): string;

    public function getModel(): ?Model;
}
