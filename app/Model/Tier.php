<?php

namespace app\model;

class Tier
{
    private ?int $tierID = null;
    private int $rasseID;
    private int $zuletztGeaendertNutzerID;
    private int $typID;
    private ?string $geschlecht = null; //Daten die eventuell nicht bekannt sind
    private string $beschreibung;
    private ?int $geburtsjahr = null;
    private ?string $name = null;
    private ?bool $kastriert = null;
    private ?string $gesundheitszustand = null;
    private ?string $charakter = null;
    private string $datum;
    private bool $geloescht;
    private string $zuletztGeaendert;


    public function __construct(int $rasseID, int $zuletztGeaendertNutzerID, int $typID, ?string $geschlecht,
                                string $beschreibung, ?int $geburtsjahr, ?string $name, ?bool $kastriert, ?string $gesundheitszustand, ?string $charakter, string $datum, bool $geloescht, string $zuletztGeaendert)
    {
        $this->rasseID = $rasseID;
        $this->zuletztGeaendertNutzerID = $zuletztGeaendertNutzerID;
        $this->typID = $typID;
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

    public function getRasseID(): int
    {
        return $this->rasseID;
    }

    public function setRasseID(int $rasseID): void
    {
        $this->rasseID = $rasseID;
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

    public function getKastriert(): ?bool
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

}





