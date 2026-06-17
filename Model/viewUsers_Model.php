<?php
 
class User{
    private PDO $db;
 
    public function __construct(PDO $db) {
        $this->db = $db;
    }
 
    public function findByUsername(string $username): array|false {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE USERNAME = :username LIMIT 1");
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
    public function getAllUsers(): array {
        $stmt = $this->db->query("SELECT ID, USERNAME, PASSWORD FROM users ORDER BY ID ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
 