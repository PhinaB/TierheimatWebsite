<?php

namespace app\core;
class Connection {
    private static $instance = null; //Singleton-Instanz
    private $connection; //Variable zum Abspeichern der Datenbankverbindung
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "tierheimat";

    protected function __construct() {
        $this->connection = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if (!$this->connection) {
            die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
        }
        echo "Verbindung erfolgreich!";
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
    public function getConnection() {
        return $this->connection;
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