<?php

namespace Entity;

use App\Core\Abstraction\Entity\Entity;

class OrderEntity extends Entity
{
    private int $id;
    private User $user;
    private Warehouse $warehouse;
    private string $deliveryAddress;
    private int $deliveryDate;
    private string $status;
    private Collection $items;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Warehouse
     */
    public function getWarehouse(): Warehouse
    {
        return $this->warehouse;
    }

    /**
     * @param Warehouse $warehouse
     */
    public function setWarehouse(Warehouse $warehouse): void
    {
        $this->warehouse = $warehouse;
    }

    /**
     * @return string
     */
    public function getDeliveryAddress(): string
    {
        return $this->deliveryAddress;
    }

    /**
     * @param string $deliveryAddress
     */
    public function setDeliveryAddress(string $deliveryAddress): void
    {
        $this->deliveryAddress = $deliveryAddress;
    }

    /**
     * @return int
     */
    public function getDeliveryDate(): int
    {
        return $this->deliveryDate;
    }

    /**
     * @param int $deliveryDate
     */
    public function setDeliveryDate(int $deliveryDate): void
    {
        $this->deliveryDate = $deliveryDate;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @param Collection $items
     */
    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }


}
