<?php

namespace app\model;

require_once '../core/Connection.php';
//Klasse dient als Datentransportobjekt
class VermisstGefundenTier
{
    //Object Mapping
    public ?int $vermisstGefundenID = null; // erst beim Speichern in der DB wird ID generiert, somit muss sie hier null sein
    public int $tierID;
    public string $ort;
    public string $kontaktaufnahme;

    public function __construct(?int $vermisstGefundenID = null, int $tierID, string $ort, string $kontaktaufnahme)
    {
        $this->vermisstGefundenID = $vermisstGefundenID;
        $this->tierID = $tierID;
        $this->ort = $ort;
        $this->kontaktaufnahme = $kontaktaufnahme;
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

