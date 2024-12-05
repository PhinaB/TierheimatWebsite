<?php

namespace app\model;
class Nutzerrolle {

    private ?int $nutzerrolleID = null;

    private string $rolle;

    public function __construct(string $rolle)
    {
        $this->rolle = $rolle;
    }

    public function getNutzerrolleID(): ?int
    {
        return $this->nutzerrolleID;
    }

    public function getRolle(): string
    {
        return $this->rolle;
    }

    public function setRolle(string $rolle): void
    {
        $this->rolle = $rolle;
    }
}
