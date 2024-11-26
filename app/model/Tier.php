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

    /**
     * @param int|null $tierID
     * @param int $rasseID
     * @param int $zuletztGeaendertNutzerID
     * @param int $typID
     * @param string|null $geschlecht
     * @param string $beschreibung
     * @param int|null $geburtsjahr
     * @param string|null $name
     * @param bool|null $kastriert
     * @param string|null $gesundheitszustand
     * @param string|null $charakter
     * @param string $datum
     * @param bool $geloescht
     * @param string $zuletztGeaendert
     */
    public function __construct(?int $tierID = null, int $rasseID, int $zuletztGeaendertNutzerID, int $typID, ?string $geschlecht,
                                string $beschreibung, ?int $geburtsjahr, ?string $name, ?bool $kastriert, ?string $gesundheitszustand, ?string $charakter, string $datum, bool $geloescht, string $zuletztGeaendert)
    {
        $this->tierID = $tierID;
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


}





