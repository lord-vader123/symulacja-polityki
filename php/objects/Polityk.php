<?php

class Polityk extends Table {
    public function __construct(mysqli $conn, ?int $id = null) {
        parent::__construct($conn, $id);
    }

    public function getDataFromDb(int $id): bool {
        if (!$id && !isset($id)) {
            return false;
        } 

        $stmt = $this->conn->prepare("SELECT * FROM polityk WHERE id = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            throw new Exception("Błąd podczas pobierania danych z bazy danych");
        }
        
        $this->data = $stmt->get_result()->fetch_assoc();

        return true;
    }

    public function insertDataToDb(): bool {
        
    }
}