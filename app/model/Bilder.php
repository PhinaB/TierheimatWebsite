<?php

namespace app\model;

class Bilder
{
    public ?int $bilderID = null;
    public int $tierID;
    public string $bildadresse;
    public bool $hauptbild;
    public string $alternativtext;

    public function __construct(?int $bilderID = null, int $tierID, string $bildadresse, bool $hauptbild, string $alternativtext)
    {
        $this->bilderID = $bilderID;
        $this->tierID = $tierID;
        $this->bildadresse = $bildadresse;
        $this->hauptbild = $hauptbild;
        $this->alternativtext = $alternativtext;
    }
}
