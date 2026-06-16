<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'MVCTRIAL';
    private $username = 'root';
    private $password = '';
    protected $conn; // protected για να μπορούν να το βλέπουν τα Models που την κληρονομούν

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }

        return $this->conn;
    }
}
?>