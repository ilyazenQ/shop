<?php

namespace App\Core\Abstraction\Facade;

use App\Core\Abstraction\DTO\DTO;
use App\Core\Abstraction\Entity\Entity;

interface FacadeInterface
{
    public function create(DTO $DTO): Entity;
    public function update(DTO $DTO, Entity $entity): Entity;
    public function delete(Entity $entity): void;
}