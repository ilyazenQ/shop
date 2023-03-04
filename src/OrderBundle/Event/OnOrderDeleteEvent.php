<?php

namespace Event;

use App\Core\Abstraction\Event\Event;
use App\Core\Abstraction\Facade\FacadeInterface;
use Facade\OrderFacade;

class OnOrderDeleteEvent extends Event
{
    /**
     * @param OrderFacade $orderFacade
     */
    public function __construct(
        private readonly FacadeInterface $orderFacade
    )
    {
    }

    public function execute(mixed $data, array $context = []): void
    {
    }

    public function setEvents(): array
    {
    }

    public function getSubscribedEvents(): array
    {
    }
}