<?php

class Partia extends Table {
    public function __construct(mysqli $conn, ?int $id = null) {
        parent::__construct($conn, $id);
    }

    public function getDataFromDb(int $id): bool {
        if (!$id && !isset($id)) {
            return false;
        } 

        $stmt = $this->conn->prepare("SELECT * FROM partia WHERE id = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            throw new Exception("Błąd podczas pobierania danych z bazy danych");
        }
        
        $this->data = $stmt->get_result()->fetch_assoc();

        return true;
    }

    public function insertDataToDb(): bool {
        if (count($this->data) !== 3 ) {
            throw new Exception("Błędna ilość argumentów");
        }
        
        $stmt = $this->conn->prepare("INSERT INTO partia(nazwa, skrot, logo_src) VALUES(?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Błąd podczas przygotowywania kwerendy");
        }
        $stmt->bind_param("sss", $this->data['nazwa'], $this->data['skrot'], $this->data['logo_src']);

        return $stmt->execute();
    }
}