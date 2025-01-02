<?php

declare(strict_types=1);

namespace app\model;
class Article {
    private ?int $artikelID = null;
    private int $nutzerID;
    private int $artID;

    private string $ueberschrift;

    private string $zwischenueberschrift;

    private string $text;

}
