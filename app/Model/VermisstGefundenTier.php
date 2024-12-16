<?php

namespace app\model;

require_once '../core/Connection.php';
//Klasse dient als Datentransportobjekt
class VermisstGefundenTier
{
    //Object Mapping
    private ?int $vermisstGefundenTierID = null; // erst beim Speichern in der DB wird ID generiert, somit muss sie hier null sein
    private int $zuletztGeaendertNutzerID;
    private int $tierartID;
    private string $typ; //vermisst oder gefunden
    private string $datum;
    private string $ort;
    private string $beschreibung;
    private string $kontaktaufnahme;
    private string $bildadresse;
    private bool $geloescht;
    private string $zuletztGeaendert;

    /**
     * @param int $zuletztGeaendertNutzerID
     * @param int $tierartID
     * @param string $typ
     * @param string $ort
     * @param string $beschreibung
     * @param string $kontaktaufnahme
     * @param string $bildadresse
     * @param bool $geloescht
     * @param string $zuletztGeaendert
     */
    public function __construct(int $zuletztGeaendertNutzerID, int $tierartID, string $typ, string $ort, string $beschreibung, string $kontaktaufnahme, string $bildadresse, bool $geloescht, string $zuletztGeaendert)
    {
        $this->zuletztGeaendertNutzerID = $zuletztGeaendertNutzerID;
        $this->tierartID = $tierartID;
        $this->typ = $typ;
        $this->ort = $ort;
        $this->beschreibung = $beschreibung;
        $this->kontaktaufnahme = $kontaktaufnahme;
        $this->bildadresse = $bildadresse;
        $this->geloescht = $geloescht;
        $this->zuletztGeaendert = $zuletztGeaendert;
    }

    public function getVermisstGefundenTierID(): ?int
    {
        return $this->vermisstGefundenTierID;
    }

    public function getZuletztGeaendertNutzerID(): int
    {
        return $this->zuletztGeaendertNutzerID;
    }

    public function setZuletztGeaendertNutzerID(int $zuletztGeaendertNutzerID): void
    {
        $this->zuletztGeaendertNutzerID = $zuletztGeaendertNutzerID;
    }

    public function getTierartID(): int
    {
        return $this->tierartID;
    }

    public function setTierartID(int $tierartID): void
    {
        $this->tierartID = $tierartID;
    }

    public function getTyp(): string
    {
        return $this->typ;
    }

    public function setTyp(string $typ): void
    {
        $this->typ = $typ;
    }

    public function getDatum(): string
    {
        return $this->datum;
    }

    public function setDatum(string $datum): void
    {
        $this->datum = $datum;
    }

    public function getOrt(): string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): void
    {
        $this->ort = $ort;
    }

    public function getBeschreibung(): string
    {
        return $this->beschreibung;
    }

    public function setBeschreibung(string $beschreibung): void
    {
        $this->beschreibung = $beschreibung;
    }

    public function getKontaktaufnahme(): string
    {
        return $this->kontaktaufnahme;
    }

    public function setKontaktaufnahme(string $kontaktaufnahme): void
    {
        $this->kontaktaufnahme = $kontaktaufnahme;
    }

    public function getBildadresse(): string
    {
        return $this->bildadresse;
    }

    public function setBildadresse(string $bildadresse): void
    {
        $this->bildadresse = $bildadresse;
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



    //TierartID wird übergeben nachdem es generiert wurde
    // Datum wird aus dem aktuellen Datum generiert im Controller
    //zuletztGeändertNutzer wird aus der ID des aktuellen Nutzers erstellt
    public function getValuesForInsert(int $zuletztGeaendertNutzerID, int $tierartID): array {
        return [
            $zuletztGeaendertNutzerID,
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
}

/* prepared Statements für Sicherheit:

$query = $mysqli->prepare('
    SELECT * FROM users
    WHERE username = ?
    AND email = ?
    AND last_login > ?');

$query->bind_param('sss', 'test' $mail, time()-3600);
$query->execute;
*/

