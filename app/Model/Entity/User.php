<?php

declare(strict_types=1);

namespace app\Model\Entity;

 class User {
     private ?int $nutzerID = null;
     private ?int $nutzerrollenID = null;
     private string $name;
     private string $email;
     private string $passwort;

     public function __construct(string $name, string $email, string $passwort)
     {
         $this->name = $name;
         $this->email = $email;
         $this->passwort = $passwort;
     }

     public function getNutzerID(): ?int
     {
         return $this->nutzerID;
     }

     public function getNutzerrollenID(): int
     {
         return $this->nutzerrollenID;
     }

     public function getName(): string
     {
         return $this->name;
     }

     public function getEmail(): string
     {
         return $this->email;
     }

     public function getPasswort(): string
     {
         return $this->passwort;
     }

     public function getValuesForInsert(int $nutzerrollenID): array{
         return [
             $nutzerrollenID,
             $this->getName(),
             $this->getEmail(),
             $this->getPasswort()
         ];
     }

 }