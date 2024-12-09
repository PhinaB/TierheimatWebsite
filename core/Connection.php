<?php

namespace core;

use Exception;
use mysqli;
use mysqli_stmt;

class Connection {
    private static ?Connection $instance = null; //Singleton-Instanz
    private mysqli $connection; //Variable zum Abspeichern der Datenbankverbindung
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $db = "tierheimat";

    /**
     * @throws Exception
     */
    protected function __construct() {
        $this->connection = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if ($this->connection->connect_error) {
            throw new Exception('Verbindung fehlgeschlagen: ' . mysqli_connect_error());
        }
        //echo "Verbindung erfolgreich!";
    }

    //Singleton-Methode, um die Instanz der Klasse zu erhalten
    public static function getInstance(): ?Connection
    {
       if (self::$instance === null){
           self::$instance = new self();
       }
       return self::$instance;
    }

    //Methode, um die Verbindung zu erhalten
    public function getConnection(): mysqli
    {
        return $this->connection;
    }

    /**
     * @throws Exception
     */
    public function prepare($query): mysqli_stmt
    {
        $stmt = $this->connection->prepare($query);
        if ($stmt === false) {
            throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $this->connection->error);
        }
        return $stmt;
    }

    /* wird aus best practice Gründen gemacht, ist eigentlich nicht notwendig*/
    public function __destruct() {
        if ($this->connection) {
            $this->connection->close();
            //echo "Verbindung geschlossen./n";
        }
    }
}

/*
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tierheimat';

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
echo "Verbindung erfolgreich!";
*/