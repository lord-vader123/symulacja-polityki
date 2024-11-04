<?php
/**
 * Klasa do obsługi tabeli "Komitet" w bazie danych.
 */
class Komitet extends Table {
    public function __construct(mysqli $conn, ?int $id = null) {
        parent::__construct($conn, $id);
    }

    /**
     * Pobiera dane komitetu na podstawie ID z bazy danych.
     *
     * @param int $id ID komitetu.
     * @return bool True, jeśli operacja się powiodła.
     * @throws \Exception Wyjątek, jeśli wystąpił błąd w zapytaniu.
     */
    public function getDataFromDb(int $id): bool {
        if (!$id && !isset($id)) {
            return false;
        } 

        $stmt = $this->conn->prepare("SELECT * FROM komitet WHERE id = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            throw new Exception("Błąd podczas pobierania danych z bazy danych");
        }
        
        $this->data = $stmt->get_result()->fetch_assoc();
        return true;
    }

    /**
     * Wstawia dane komitetu do bazy danych.
     *
     * @return bool True, jeśli operacja się powiodła.
     * @throws \Exception Wyjątek, jeśli wystąpił błąd w zapytaniu.
     */
    public function insertDataToDb(): bool {
        if (count($this->data) !== 5 ) {
            throw new Exception("Błędna ilość argumentów");
        }
        
        $stmt = $this->conn->prepare("INSERT INTO komitet(nazwa, partia_id) VALUES(?, ?)");
        if (!$stmt) {
            throw new Exception("Błąd podczas przygotowywania kwerendy");
        }
        $stmt->bind_param("ss", $this->data['nazwa'], $this->data['partia_id']);
        return $stmt->execute();
    }
}