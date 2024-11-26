<?php

namespace app\model;

class Tier
{
    public ?int $tierID = null;
    public int $rasseID;
    public int $zuletztGeaendertNutzerID;
    public int $typID;
    public ?string $geschlecht = null; //Daten die eventuell nicht bekannt sind
    public string $beschreibung;
    public ?int $geburtsjahr = null;
    public ?string $name = null;
    public bool $kastriert;
    public ?string $gesundheitszustand = null;
    public ?string $charakter = null;
    public string $datum;
    public bool $geloescht;
    public string $zuletztGeaendert;

    public function __construct(
        int     $rasseID,
        int     $zuletztGeaendertNutzerID,
        int     $typID,
        string  $beschreibung,
        bool    $kastriert,
        string  $datum,
        bool    $geloescht,
        string  $zuletztGeaendert,
        ?string $geschlecht = null,
        ?int    $geburtsjahr = null,
        ?string $name = null,
        ?string $gesundheitszustand = null,
        ?string $charakter = null
    )
    {
        $this->rasseID = $rasseID;
        $this->zuletztGeaendertNutzerID = $zuletztGeaendertNutzerID;
        $this->typID = $typID;
        $this->beschreibung = $beschreibung;
        $this->kastriert = $kastriert;
        $this->datum = $datum;
        $this->geloescht = $geloescht;
        $this->zuletztGeaendert = $zuletztGeaendert;
        $this->geschlecht = $geschlecht;
        $this->geburtsjahr = $geburtsjahr;
        $this->name = $name;
        $this->gesundheitszustand = $gesundheitszustand;
        $this->charakter = $charakter;
    }
}





