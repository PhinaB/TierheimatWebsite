<?php

declare(strict_types=1);

namespace app\Model\Entity;
class UserRole {

    private ?int $nutzerrolleID;
    private string $rolle;
    private bool $kannLesen;
    private bool $kannSchreiben;
    private bool $kannEigenesBearbeitenUndLoeschen;
    private bool $kannAllesLoeschen;

    /**
     * @param int|null $nutzerrolleID
     * @param string $rolle
     * @param bool $kannLesen
     * @param bool $kannSchreiben
     * @param bool $kannEigenesBearbeitenUndLoeschen
     * @param bool $kannAllesLoeschen
     */
    public function __construct(?int $nutzerrolleID, string $rolle, bool $kannLesen, bool $kannSchreiben, bool $kannEigenesBearbeitenUndLoeschen, bool $kannAllesLoeschen)
    {
        $this->nutzerrolleID = $nutzerrolleID;
        $this->rolle = $rolle;
        $this->kannLesen = $kannLesen;
        $this->kannSchreiben = $kannSchreiben;
        $this->kannEigenesBearbeitenUndLoeschen = $kannEigenesBearbeitenUndLoeschen;
        $this->kannAllesLoeschen = $kannAllesLoeschen;
    }

    public function getNutzerrolleID(): ?int
    {
        return $this->nutzerrolleID;
    }

    public function getRolle(): string
    {
        return $this->rolle;
    }

    public function isKannLesen(): bool
    {
        return $this->kannLesen;
    }

    public function isKannSchreiben(): bool
    {
        return $this->kannSchreiben;
    }

    public function isKannEigenesBearbeitenUndLoeschen(): bool
    {
        return $this->kannEigenesBearbeitenUndLoeschen;
    }

    public function isKannAllesLoeschen(): bool
    {
        return $this->kannAllesLoeschen;
    }

    public function getValuesForInsert(): array
    {
        return [
            $this->isKannLesen(),
            $this->isKannSchreiben(),
            $this->isKannEigenesBearbeitenUndLoeschen(),
            $this->isKannAllesLoeschen(),
            $this->getRolle(),
        ];
    }

}
