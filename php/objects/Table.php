<?php

abstract class Table {
    private array $data;
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

    public function setData(array $data) : void {
        $this->data = $data;
    }

    public function getData() : array {
        return $this->data;
    }

    /**
     * Funkcja pobierająca dane z bazy danych na podstawie podanego id
     * @param int $id Id kolumny
     * @throws \Exception Rzuca wyjątkiem mówiącym o błędzie w zapytaniu
     * @return bool Zwraca true, jeżeli wszystkie operacje zostały wykonane prawidłowo
     */
    abstract function getDataFromDb(int $id) : bool;
    /**
     * Funkcja wstawiająca dane do bazy danych
     * @throws \Exception Rzuca wyjątkiem w razie błędu
     * @return bool Zwraca true, jeżeli wszystko poszło dobrze :D
     */
    abstract function insertDataToDb() : bool;
}