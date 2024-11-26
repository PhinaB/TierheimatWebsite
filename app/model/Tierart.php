<?php

namespace app\model;
class Tierart
{
    private ?int $tierartID = null;
    private string $tierart;

    public function __construct(?int $tierartID = null, string $tierart)
    {
        $this->tierartID = $tierartID;
        $this->tierart = $tierart;
    }

    public function getTierartID(): int
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
}