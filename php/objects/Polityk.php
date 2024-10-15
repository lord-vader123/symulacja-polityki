<?php

class Polityk extends Table {
    public function __construct(mysqli $conn, ?int $id = null) {
        parent::__construct($conn, $id);
    }

    public function getDataFromDb(int $id): bool {

    }

    public function insertDataToDb(): bool {
        
    }
}