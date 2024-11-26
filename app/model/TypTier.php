<?php

namespace app\model;

class TypTier {
    private ?int $typID = null;
    private string $typ;

    public function __construct (?int $typID = null, string $typ) {
        $this->typID = $typID;
        $this->typ = $typ;
    }

    public function getTypID(): ?int
    {
        return $this->typID;
    }

    public function setTypID(?int $typID): void
    {
        $this->typID = $typID;
    }

    public function getTyp(): string
    {
        return $this->typ;
    }

    public function setTyp(string $typ): void
    {
        $this->typ = $typ;
    }
}

