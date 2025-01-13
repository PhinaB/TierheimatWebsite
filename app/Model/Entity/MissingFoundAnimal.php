<?php

declare(strict_types=1);

namespace app\Model\Entity;

class MissingFoundAnimal
{
    private ?int $vermisstGefundenTierID = null;
    private int $zuletztGeaendertNutzerID;
    private ?int $tierartID = null;
    private string $typ;
    private string $datum;
    private string $ort;
    private string $beschreibung;
    private string $kontaktaufnahme;
    private ?string $bildadresse = null;
    private bool $geloescht;
    private string $zuletztGeaendert;

    public function __construct(
        int $zuletztGeaendertNutzerID,
        string $typ,
        string $datum,
        string $ort,
        string $beschreibung,
        string $kontaktaufnahme,
        ?string $bildadresse,
        bool $geloescht,
        string $zuletztGeaendert
    ) {
        $this->zuletztGeaendertNutzerID = $zuletztGeaendertNutzerID;
        $this->typ = $typ;
        $this->ort = $ort;
        $this->beschreibung = $beschreibung;
        $this->kontaktaufnahme = $kontaktaufnahme;
        $this->bildadresse = $bildadresse;
        $this->geloescht = $geloescht;
        $this->zuletztGeaendert = $zuletztGeaendert;
        $this->datum = $datum;
    }

    public function getVermisstGefundenTierID(): ?int
    {
        return $this->vermisstGefundenTierID;
    }

    public function setVermisstGefundenTierID(?int $vermisstGefundenTierID): void
    {
        $this->vermisstGefundenTierID = $vermisstGefundenTierID;
    }

    public function getZuletztGeaendertNutzerID(): int
    {
        return $this->zuletztGeaendertNutzerID;
    }

    public function getTyp(): string
    {
        return $this->typ;
    }

    public function getDatum(): string
    {
        return $this->datum;
    }

    public function getOrt(): string
    {
        return $this->ort;
    }

    public function getBeschreibung(): string
    {
        return $this->beschreibung;
    }

    public function getKontaktaufnahme(): string
    {
        return $this->kontaktaufnahme;
    }

    public function getBildadresse(): ?string
    {
        return $this->bildadresse;
    }

    public function isGeloescht(): bool
    {
        return $this->geloescht;
    }

    public function getZuletztGeaendert(): string
    {
        return $this->zuletztGeaendert;
    }

    public function getValuesForInsert(int $tierartID): array {
        return [
            $this->getZuletztGeaendertNutzerID(),
            $tierartID,
            $this->getTyp(),
            $this->getDatum(),
            $this->getOrt(),
            $this->getBeschreibung(),
            $this->getKontaktaufnahme(),
            $this->getBildadresse(),
            $this->isGeloescht(),
            $this->getZuletztGeaendert(),
        ];
    }

    public function getValuesForEdit(int $tierartID, string $bildadresse): array {
        return [
            $tierartID,
            $this->getTyp(),
            $this->getDatum(),
            $this->getOrt(),
            $this->getBeschreibung(),
            $this->getKontaktaufnahme(),
            $bildadresse,
            $this->getZuletztGeaendert(),
            $this->getVermisstGefundenTierID(),
        ];
    }
}



