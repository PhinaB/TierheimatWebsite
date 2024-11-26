<?php

namespace app\model;

class TypTier {
    public ?int $typID = null;
    public string $typ;

    public function __construct (?int $typID = null, string $typ) {
        $this->typID = $typID;
        $this->typ = $typ;
    }
}

