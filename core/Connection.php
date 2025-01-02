<?php

declare(strict_types=1);

namespace core;

use Exception;
use mysqli;
use mysqli_result;
use mysqli_stmt;

class Connection {
    private static ?Connection $instance = null; //Singleton-Instanz
    private mysqli $connection; //Variable zum Abspeichern der Datenbankverbindung
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $db = "tierheimat";

    // TODO: kein Singleton -> steht im Repository von Herr Spehr!!!!

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

    /**
     * @throws Exception
     */
    public function query(string $sql)
    {
        $result = $this->connection->query($sql);

        if (!$result) {
            throw new Exception("Fehler bei der SQL-Abfrage: " . $this->connection->error);
        }

        // Ergebnisse verarbeiten, falls es eine SELECT-Abfrage ist
        if ($result instanceof mysqli_result) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        // Für INSERT/UPDATE/DELETE-Abfragen
        return $this->connection->affected_rows;
    }

    /**
     * @throws Exception
     */
    public function executeQuery($sql)
    {
        try {
            $result = $this->query($sql);
            if (!$result) {
                throw new Exception("Fehler bei der Abfrage");
            }
            return $result;
        } catch (Exception $e) {
            throw new Exception("Fehler beim Ausführen der Abfrage: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function begin_transaction(): void
    {
        if (!$this->connection->begin_transaction()) {
            throw new Exception("Fehler beim Starten der Transaktion: " . $this->connection->error);
        }
    }

    /**
     * @throws Exception
     */
    public function commit():void {
        if (!$this->connection->commit()) {
            throw new Exception("Fehler beim Commit der Transaktion: " . $this->connection->error);
        }
    }

    /**
     * @throws Exception
     */
    public function rollback(): void
    {
        if (!$this->connection->rollback()) {
            throw new Exception("Fehler beim Rollback der Transaktion: " . $this->connection->error);
        }
    }

    public function getInsertId(): int {
        return $this->connection->insert_id;
    }
}