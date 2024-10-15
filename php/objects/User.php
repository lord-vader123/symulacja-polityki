<?php

/**
 * Objekt pozwalający na operowanie na tabeli "User" w bazie danych
 */
class User {
    /**
     * Tabela asocajcyjna zawierająca wszystkie kolumny tabeli User
     * @var array
     */
    private array $data;

    /**
     * Obiekt połączenia z bazą danych
     * @var mysqli
     */
    private mysqli $conn;

    /**
     * Pobiera dwa argumenty, jeżeli parametr $id zostaje podany, to na jego podstawie pobiera dane z bazy danych do $data
     * @param mysqli $conn
     * @param mixed $id
     */
    public function __construct(mysqli $conn, ?int $id = null) {
        if (!$conn) {
            die ("Nie podano połączenia z bazą danych");
        }

        $this->conn = $conn;

        if (!$id) {
            return;
        }


    }

    /**
     * Funkcja pobierająca dane z bazy danych na podstawie podanego id
     * @param int $id Id użytkownika
     * @throws \Exception Rzuca wyjątkiem mówiącym o błędzie w zapytaniu
     * @return bool Zwraca true, jeżeli wszystkie operacje zostały wykonane prawidłowo
     */
    private function getDataFromDb(int $id) : bool{
        if (!$id && !isset($id)) {
            return false;
        } 

        $stmt = $this->conn->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            throw new Exception("Błąd podczas pobierania danych z bazy danych");
        }
        
        $this->data = $stmt->get_result()->fetch_assoc();

        return true;
    }
}