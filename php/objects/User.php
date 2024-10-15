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
        try {
            $this->getDataFromDb($id);
        } catch (Exception $e) {
            die ("". $e->getMessage());
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

    /**
     * Funkcja wstawiająca dane do bazy danych
     * @throws \Exception Rzuca wyjątkiem w razie błędu
     * @return bool Zwraca true, jeżeli wszystko poszło dobrze :D
     */
    public function insertDataToDb() : bool {
        if (count($this->data) !== 2 ) {
            throw new Exception("Błędna ilość argumentów");
        }
        
        $stmt = $this->conn->prepare("INSERT INTO user(login, password) VALUES(?, ?)");
        if (!$stmt) {
            throw new Exception("Błąd podczas przygotowywania kwerendy");
        }

        $stmt->bind_param("ss", $this->data['login'], $this->data['password']);

        return $stmt->execute();
    }

    public function setData(array $data) : void {
        $this->data = $data;
    }

    public function getData() : array {
        return $this->data;
    }
}