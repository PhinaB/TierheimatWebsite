<?php

namespace app\Model;
class Tierart extends AbstractModel
{
    private ?int $tierartID = null;
    private string $tierart;

    public function __construct(string $tierart)
    {
        $this->tierart = $tierart;
    }

    public function getTierartID(): ?int
    {
        return $this->tierartID;
    }

    public function getTierart(): string
    {
        return $this->tierart;
    }

    public function setTierart(string $tierart): void
    {
        $this->tierart = $tierart;
    }

    public function getValuesForInsert(): array {
        return [$this->getTierart()];
    }
}