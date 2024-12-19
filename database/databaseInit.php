<?php
require_once __DIR__ . "/../core/Connection.php";

// TODO: WICHTIG für Doku: man muss manuell vorher DROP DATABASE tierheimat; CREATE DATABASE tierheimat; ausführen
//   Adresse für Initialisierung: http://127.0.0.1/Studium/ws2425_dwp_wachs_herpe_burger/database/databaseInit.php

use core\Connection;

$conn = Connection::getInstance()->getConnection();

$sqlFile = 'tierheimat.sql';
$sqlCommands = file_get_contents($sqlFile);

if ($conn->multi_query($sqlCommands)) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
    echo "SQL-Befehle erfolgreich ausgeführt.\n";
} else {
    die("Fehler beim Ausführen der SQL-Datei: " . $conn->error);
}