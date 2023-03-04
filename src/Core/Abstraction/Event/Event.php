<?php

namespace App\Core\Abstraction\Event;

abstract class Event
{
    abstract public function execute(mixed $data, array $context = []): void;
    abstract public function setEvents(): array;
    abstract public function getSubscribedEvents(): array;

}