<?php

/**
 * Klasa do obsługi przesyłania i zapisywania obrazów na serwerze.
 */
class ImageHandler {
    /** @var string Ścieżka do katalogu docelowego dla zapisywanego pliku */
    private string $filePath;
    
    /** @var string Typ pliku (rozszerzenie) */
    private string $fileType;
    
    /** @var string|null Ostateczna ścieżka zapisanego pliku */
    private ?string $finalPath = null;
    
    /** @var array Tablica z informacjami o pliku */
    private array $file;

    /**
     * Konstruktor klasy.
     *
     * @param string $dirName Nazwa katalogu do przechowywania pliku.
     * @param array $file Tablica z informacjami o przesyłanym pliku.
     * @throws \Exception Wyjątek, jeśli przesłany plik jest nieprawidłowy.
     */
    public function __construct(string $dirName, array $file) {
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            throw new Exception('Invalid file data provided');
        }
        $this->fileType = pathinfo(basename($file['name']), PATHINFO_EXTENSION);
        $this->filePath = __DIR__ . '/../../assets/user_images/'. $dirName . '/';
        $this->file = $file;
    }

    /**
     * Zapisuje plik na serwerze.
     *
     * @return bool True, jeśli zapis zakończył się sukcesem.
     * @throws \Exception Wyjątek w razie niepowodzenia.
     */
    public function saveFile() : bool {
        $maxAttempts = 20;
        $currentAttempt = 0;
        
        while ($maxAttempts > $currentAttempt) {
            $savePath = $this->filePath . $this->generateRandomName(20) . '.' . $this->fileType;
            if (!file_exists($savePath)) {
                if (move_uploaded_file(realpath($this->file['tmp_name']), $savePath)) {
                    $this->finalPath = $savePath;
                    return true;
                } else {
                    throw new Exception('Failed saving file');
                }
            }
            $currentAttempt++;
        }
        return false;
    }

    /**
     * Zwraca ścieżkę do ostatecznie zapisanego pliku.
     *
     * @return string Ścieżka do pliku.
     * @throws \Exception Wyjątek, jeśli ścieżka nie jest ustawiona.
     */
    public function getFinalPath() : string {
        return $this->finalPath ?? throw new Exception('Final path not set');
    }

    /**
     * Generuje losową nazwę dla pliku.
     *
     * @param int $lenght Długość generowanej nazwy.
     * @return string Losowa nazwa pliku.
     */
    private function generateRandomName(int $lenght) : string {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = '';
        for ($i = 0; $i < $lenght; $i++) {
            $name .= $chars[random_int(0, strlen($chars) -1)];
        }
        return trim($name);
    }
}