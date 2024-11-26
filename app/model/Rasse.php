<?php

namespace app\model;
class Rasse
{
    public ?int $rasseID = null;
    public int $tierartID;
    public string $rasse;

    public function __construct(?int $rasseID = null, int $tierartID, string $rasse)
    {
        $this->rasseID = $rasseID;
        $this->tierartID = $tierartID;
        $this->rasse = $rasse;
    }
}
