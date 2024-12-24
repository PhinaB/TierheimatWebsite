<?php

namespace app\model;
class Breed
{
    private ?int $rasseID = null;
    private int $tierartID;
    private string $rasse;

    public function __construct(int $tierartID, string $rasse)
    {
        $this->tierartID = $tierartID;
        $this->rasse = $rasse;
    }

    public function getRasseID(): ?int
    {
        return $this->rasseID;
    }

    public function getTierartID(): int
    {
        return $this->tierartID;
    }

    public function setTierartID(int $tierartID): void
    {
        $this->tierartID = $tierartID;
    }

    public function getRasse(): string
    {
        return $this->rasse;
    }

    public function setRasse(string $rasse): void
    {
        $this->rasse = $rasse;
    }
}
