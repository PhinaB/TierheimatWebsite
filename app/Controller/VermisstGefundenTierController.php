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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST ['absenden'])) {
                // Daten aus dem Formular validieren
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
                $typTier= new TypTier();
                $typTier->setTyp($anliegenVermisstGefunden);

                //Klasse Tierart mit Tierart
                $tierart = new Tierart ();
                $tierart->setTierart($tierarten);


                //Klasse Tier mit Datum
                $tier = new Tier();
                $tier->setDatum($datum);
                $tier->setBeschreibung($tierbeschreibung);

                //Klasse VermisstGefundenTier mit Ort und Kontaktaufnahme
                $vermisstGefundenTier = new VermisstGefundenTier();
                $vermisstGefundenTier->setOrt($ort);
                //Möglichkeiten Email oder Telefon
                $vermisstGefundenTier->setKontaktaufnahme($kontaktaufnahme);

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