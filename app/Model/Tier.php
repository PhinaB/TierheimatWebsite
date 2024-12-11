<?php

namespace app\model;

class Tier extends AbstractModel
{
    protected ?int $tierID = null;
    protected int $zuletztGeaendertNutzerID;
    protected int $typID;

    protected int $tierartID;
    protected ?string $geschlecht = null; //Daten die eventuell nicht bekannt sind
    protected string $beschreibung;
    protected ?int $geburtsjahr = null;
    protected ?string $name = null;
    protected ?bool $kastriert = null;
    protected ?string $gesundheitszustand = null;
    protected ?string $charakter = null;
    protected string $datum;
    protected bool $geloescht;
    protected string $zuletztGeaendert;


    public function __construct(int $zuletztGeaendertNutzerID, int $typID, int $tierartID, ?string $geschlecht,
                                string $beschreibung, ?int $geburtsjahr, ?string $name, ?bool $kastriert, ?string $gesundheitszustand, ?string $charakter, string $datum, bool $geloescht, string $zuletztGeaendert)
    {
        $this->zuletztGeaendertNutzerID = $zuletztGeaendertNutzerID;
        $this->typID = $typID;
        $this->tierartID = $tierartID;
        $this->geschlecht = $geschlecht;
        $this->beschreibung = $beschreibung;
        $this->geburtsjahr = $geburtsjahr;
        $this->name = $name;
        $this->kastriert = $kastriert;
        $this->gesundheitszustand = $gesundheitszustand;
        $this->charakter = $charakter;
        $this->datum = $datum;
        $this->geloescht = $geloescht;
        $this->zuletztGeaendert = $zuletztGeaendert;
    }


    public function getTierID(): ?int
    {
        return $this->tierID;
    }

    public function getZuletztGeaendertNutzerID(): int
    {
        return $this->zuletztGeaendertNutzerID;
    }

    public function setZuletztGeaendertNutzerID(int $zuletztGeaendertNutzerID): void
    {
        $this->zuletztGeaendertNutzerID = $zuletztGeaendertNutzerID;
    }

    public function getTypID(): int
    {
        return $this->typID;
    }

    public function setTypID(int $typID): void
    {
        $this->typID = $typID;
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

    public function isKastriert(): ?bool
    {
        return $this->kastriert;
    }

    public function setKastriert(?bool $kastriert): void
    {
        $this->kastriert = $kastriert;
    }

    public function getGesundheitszustand(): ?string
    {
        return $this->gesundheitszustand;
    }

    public function setGesundheitszustand(?string $gesundheitszustand): void
    {
        $this->gesundheitszustand = $gesundheitszustand;
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

    public function isGeloescht(): bool
    {
        return $this->geloescht;
    }

    public function setGeloescht(bool $geloescht): void
    {
        $this->geloescht = $geloescht;
    }

    public function getZuletztGeaendert(): string
    {
        return $this->zuletztGeaendert;
    }

    public function setZuletztGeaendert(string $zuletztGeaendert): void
    {
        $this->zuletztGeaendert = $zuletztGeaendert;
    }

    // Methode, die alle Werte in einem Array zurückgibt
    public function getValuesForInsert(int $typID, int $tierartID, int $zuletztGeaenderterNutzerID): array {
        return [
            $this->getRasseID(),
            $zuletztGeaenderterNutzerID,
            $typID,
            $tierartID,
            $this->getGeschlecht(),
            $this->getBeschreibung(),
            $this->getGeburtsjahr(),
            $this->getName(),
            $this->isKastriert(),
            $this->getGesundheitszustand(),
            $this->getCharakter(),
            $this->getDatum(),
            $this->isGeloescht(),
            $this->getZuletztGeaendert()
        ];
    }
}





