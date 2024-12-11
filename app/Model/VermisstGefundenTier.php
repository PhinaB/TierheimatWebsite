<?php

namespace app\model;

require_once '../core/Connection.php';
//Klasse dient als Datentransportobjekt
class VermisstGefundenTier
{
    //Object Mapping
    protected ?int $vermisstGefundenID = null; // erst beim Speichern in der DB wird ID generiert, somit muss sie hier null sein
    protected int $tierID;
    protected string $ort;
    protected string $kontaktaufnahme;

    public function __construct(string $ort, string $kontaktaufnahme, int $tierID)
    {
        $this->ort = $ort;
        $this->kontaktaufnahme = $kontaktaufnahme;
        $this->tierID = $tierID;
    }

    public function getVermisstGefundenID(): ?int
    {
        return $this->vermisstGefundenID;
    }

    public function getTierID(): int
    {
        return $this->tierID;
    }

    public function setTierID(int $tierID): void
    {
        $this->tierID = $tierID;
    }

    public function getOrt(): string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): void
    {
        $this->ort = $ort;
    }

    public function getKontaktaufnahme(): string
    {
        return $this->kontaktaufnahme;
    }

    public function setKontaktaufnahme(string $kontaktaufnahme): void
    {
        $this->kontaktaufnahme = $kontaktaufnahme;
    }

    public function getValuesForInsert(int $tierID): array {
        return [$tierID, $this->ort, $this->kontaktaufnahme];
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

