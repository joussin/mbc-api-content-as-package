<?php

namespace MbcApiContent\Entity\Interfaces;

use MbcApiContent\Models\ModelInterface;

interface EntityInterface
{

    public function getName(): ?string;

    public function getModel(): ?ModelInterface;
}
