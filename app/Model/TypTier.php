<?php

namespace app\model;

class TypTier extends AbstractModel
{
    private ?int $typID = null;
    private string $typ;

    public function __construct (string $typ)
    {
        $this->typ = $typ;
    }

    public function getTypID(): ?int
    {
        return $this->typID;
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

