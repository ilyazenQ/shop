<?php

namespace Service;

use App\Core\Abstraction\DTO\DTO;
use App\Core\Abstraction\Entity\Entity;
use App\Core\Abstraction\Service\Collection;
use App\Core\Abstraction\Service\ServiceInterface;

class OrderService implements ServiceInterface
{

    public function __construct()
    {
    }

    public function create(DTO $DTO): Entity
    {}

    public function update(DTO $DTO, Entity $entity): Entity
    {}

    public function delete($entity): void
    {}

    public function sendToDelivery(mixed $data, array $context = []): void
    {}
}