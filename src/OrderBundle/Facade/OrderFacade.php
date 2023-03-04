<?php

namespace Facade;

use App\Core\Abstraction\DTO\DTO;
use App\Core\Abstraction\Entity\Entity;
use App\Core\Abstraction\Facade\FacadeInterface;
use App\Core\Abstraction\Service\ServiceInterface;

class OrderFacade implements FacadeInterface
{
    public function __construct(
        private readonly ServiceInterface $orderService,
    )
    {
    }

    public function create(DTO $DTO): Entity
    {
        return $this->orderService->create(DTO: $DTO);
    }

    public function update(DTO $DTO, Entity $entity): Entity
    {
        return $this->orderService->update(DTO: $DTO, entity: $entity);
    }

    public function delete(Entity $entity): void
    {
        $this->orderService->delete(entity: $entity);
    }

    public function sendToDelivery(mixed $data, array $context = []): void
    {
        $this->orderService->sendToDelivery(data: $data, context: $context);
    }

}