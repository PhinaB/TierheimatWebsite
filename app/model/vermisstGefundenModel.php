<?php

namespace app\model;
class VermisstGefundenModel
{

    public $VermisstGefundenID;
    public $TierID;
    public $Ort;
    public $Kontaktaufnahme;


CREATE TABLE VermisstGefundenTiere (
VermisstGefundenID INTEGER PRIMARY KEY AUTO_INCREMENT,
TierID INTEGER NOT NULL,
Ort VARCHAR(250) NOT NULL,
Kontaktaufnahme VARCHAR(15) NOT NULL,
FOREIGN KEY (TierID) REFERENCES Tiere(TierID)
}
