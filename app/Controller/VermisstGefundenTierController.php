<?php

namespace app\Controller;

use app\Model\VermisstGefundenTierModel;
use app\Model\Tier;
use app\Model\VermisstGefundenTier;
use app\Model\TypTier;
use app\Model\Tierart;

class VermisstGefundenTierController
{

    private VermisstGefundenTierModel $model;

    /**
     * @param vermisstGefundenTierModel $vermisstGefundenTierModel
     */
    public function __construct(VermisstGefundenTierModel $model)
    {
        $this->model = $model;
    }

    public function addVermisstGefundenTier(): void {

        /*$input = file_get_contents('php://input');     //liest Rohdaten aus dem Body eines HTTP-Request
        $data = json_decode($input, true);  */        //Wandelt erhaltene JSON-Daten in PHP-Array um

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST ['absenden'])) {

                $anliegenVermisstGefunden = $_POST['anliegenVermisstGefunden'] ?? null;
                $tierarten = $_POST['tierart'] ?? null;
                $datum = $_POST['datum'] ?? null;
                $ort = $_POST['ort'] ?? null;
                $tierbeschreibung = $_POST['tierbeschreibung'] ?? null;
                $tierbild = $_POST['tierbild'] ?? null;
                $kontaktaufnahme = $_POST['kontaktaufnahme'] ?? null;

                //Pflichtfelder
                if (!$anliegenVermisstGefunden || !$tierarten || !$datum || !$ort || !$tierbeschreibung || !$kontaktaufnahme) {
                    throw new \Exception("Füllen Sie die Pflichtfelder aus!");
                }

                //Klasse Typ mit anliegenVermisstGefunden (vermisst/gefunden)
                $typTier= new TypTier($anliegenVermisstGefunden);

                //Klasse Tierart mit Tierart
                $tierart = new Tierart ($tierarten);


                //Klasse Tier mit Datum und Beschreibung
                $tier = new Tier(); // TODO
                $tier->setDatum($datum);
                $tier->setBeschreibung($tierbeschreibung);

                /*$tier = Model->AddTier();
                Model->AddVermisstGefundenTier($tier->getID(), ...)
                */




                //Klasse VermisstGefundenTier mit Ort und Kontaktaufnahme
                /*TierID ist hier noch leer. Erst mit dem Aufruf von VermisstGefundenTierModel werden die Daten
                in die Datenbank eingetragen und die ID generiert*/
                $vermisstGefundenTier = new VermisstGefundenTier($ort, $kontaktaufnahme);
               // $vermisstGefundenTier->setOrt($ort);
                //Möglichkeiten Email oder Telefon
                //$vermisstGefundenTier->setKontaktaufnahme($kontaktaufnahme);

                //TO DO: Klasse Bilder mit Bildadresse, Hauptbild, Alternativtext bestehend aus Tierarten
                try {
                    $this->model->insertVermisstGefundenTiere($tier, $vermisstGefundenTier, $tierart, $typTier);
                }
                catch (\Exception $exception) {
                    throw new \Exception($exception->getMessage());
                }
            }
        }
    }

}