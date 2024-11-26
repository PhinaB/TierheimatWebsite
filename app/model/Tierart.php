<?php

namespace app\model;
class Tierart
{
    public ?int $tierartID = null;
    public string $tierart;

    public function __construct(?int $tierartID = null, string $tierart)
    {
        $this->tierartID = $tierartID;
        $this->tierart = $tierart;
    }
}