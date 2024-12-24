<?php

namespace app\model;

class Pictures
{
    private ?int $bilderID = null;
    private int $tierID;
    private string $bildadresse;
    private bool $hauptbild;
    private string $alternativtext;

    //BildID wird mit Auto-Increment gesetzt, wird im Konstruktor somit nicht gesetzt und bekommt keinen Setter
    public function __construct(int $tierID, string $bildadresse, bool $hauptbild, string $alternativtext)
    {
        $this->tierID = $tierID;
        $this->bildadresse = $bildadresse;
        $this->hauptbild = $hauptbild;
        $this->alternativtext = $alternativtext;
    }

    public function getBilderID(): ?int
    {
        return $this->bilderID;
    }

    public function getTierID(): int
    {
        return $this->tierID;
    }

    public function setTierID(int $tierID): void
    {
        $this->tierID = $tierID;
    }

    public function getBildadresse(): string
    {
        return $this->bildadresse;
    }

    public function setBildadresse(string $bildadresse): void
    {
        $this->bildadresse = $bildadresse;
    }

    public function isHauptbild(): bool
    {
        return $this->hauptbild;
    }

    public function setHauptbild(bool $hauptbild): void
    {
        $this->hauptbild = $hauptbild;
    }

    public function getAlternativtext(): string
    {
        return $this->alternativtext;
    }

    public function setAlternativtext(string $alternativtext): void
    {
        $this->alternativtext = $alternativtext;
    }

    public function getValuesForInsert(int $tierID, bool $hauptbild, string $alternativtext): array {
        return [$tierID, $this->getTierID(), $this->getBildadresse(), $hauptbild, $this->getAlternativtext()];
    }
}
