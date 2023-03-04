<?php

namespace App\Core\Abstraction\Service;

use App\Core\Abstraction\DTO\DTOInterface;
use App\Core\Abstraction\Entity\Entity;

interface ServiceInterface
{
    public function create(DTO $DTO): Entity;

    public function update(DTO $DTO, Entity $entity): Entity;

    public function delete(Entity $entity): void;

}