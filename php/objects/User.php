<?php

include_once __DIR__ . '/Table.php';
/**
 * Objekt pozwalający na operowanie na tabeli "User" w bazie danych
 */
class User extends Table
{
    /**
     * Tabela asocajcyjna zawierająca wszystkie kolumny tabeli User
     * @var array
     */
    protected array $data;

    /**
     * Obiekt połączenia z bazą danych
     * @var mysqli
     */
    protected mysqli $conn;

    public function __construct(mysqli $conn, ?int $id = null)
    {
        parent::__construct($conn, $id);
    }

    public function getDataFromDb(int $id): bool
    {
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

    public function insertDataToDb(): bool
    {
        if (count($this->data) !== 2) {
            throw new Exception("Błędna ilość argumentów");
        }

        $stmt = $this->conn->prepare("INSERT INTO user(login, password) VALUES(?, ?)");
        if (!$stmt) {
            throw new Exception("Błąd podczas przygotowywania kwerendy");
        }

        $stmt->bind_param("ss", $this->data['login'], $this->data['password']);

        return $stmt->execute();
    }
}