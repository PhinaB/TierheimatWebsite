<?php

namespace app\model;

class Animal extends AbstractModel
{
    private ?int $tierID = null;

    private int $tierartID;
    private ?string $geschlecht = null; //Daten die eventuell nicht bekannt sind
    private string $beschreibung;
    private ?int $geburtsjahr = null;
    private ?string $name = null;

    private ?string $charakter = null;
    private string $datum;


    // Methode, die alle Werte in einem Array zurückgibt

    /**
     * @param int $tierartID
     * @param string|null $geschlecht
     * @param string $beschreibung
     * @param int|null $geburtsjahr
     * @param string|null $name
     * @param string|null $charakter
     * @param string $datum
     */
    public function __construct(int $tierartID, ?string $geschlecht, string $beschreibung, ?int $geburtsjahr, ?string $name, ?string $charakter, string $datum)
    {
        $this->tierartID = $tierartID;
        $this->geschlecht = $geschlecht;
        $this->beschreibung = $beschreibung;
        $this->geburtsjahr = $geburtsjahr;
        $this->name = $name;
        $this->charakter = $charakter;
        $this->datum = $datum;
    }

    public function getTierID(): ?int
    {
        return $this->tierID;
    }

    public function getTierartID(): int
    {
        return $this->tierartID;
    }

    public function setTierartID(int $tierartID): void
    {
        $this->tierartID = $tierartID;
    }

    public function getGeschlecht(): ?string
    {
        return $this->geschlecht;
    }

    public function setGeschlecht(?string $geschlecht): void
    {
        $this->geschlecht = $geschlecht;
    }

    public function getBeschreibung(): string
    {
        return $this->beschreibung;
    }

    public function setBeschreibung(string $beschreibung): void
    {
        $this->beschreibung = $beschreibung;
    }

    public function getGeburtsjahr(): ?int
    {
        return $this->geburtsjahr;
    }

    public function setGeburtsjahr(?int $geburtsjahr): void
    {
        $this->geburtsjahr = $geburtsjahr;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getCharakter(): ?string
    {
        return $this->charakter;
    }

    public function setCharakter(?string $charakter): void
    {
        $this->charakter = $charakter;
    }

    public function getDatum(): string
    {
        return $this->datum;
    }

    public function setDatum(string $datum): void
    {
        $this->datum = $datum;
    }

    public function getValuesForInsert(int $tierartID): array {
        return [
            $tierartID,
            $this->getGeschlecht(),
            $this->getBeschreibung(),
            $this->getGeburtsjahr(),
            $this->getName(),
            $this->getCharakter(),
            $this->getDatum(),
        ];
    }
}





