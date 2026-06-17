<?php

class LoginModel {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function findByUsername(string $username): array|false {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE USERNAME = :username LIMIT 1");
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyPassword(string $inputPassword, string $hashedPassword): bool {
        return password_verify($inputPassword, $hashedPassword);
    }
}