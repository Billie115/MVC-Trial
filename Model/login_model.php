<?php
require_once __DIR__ . '/../database.php';

class loginModel{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    public function checkLogIn($username, $password){
        $check = $this->db->prepare("SELECT * FROM USERS WHERE  USERNAME = :username AND PASSWORD = :password");
        $check->execute(['username' => $username, 'password' => $password]);
        return $check->fetch(PDO::FETCH_ASSOC);
    }
}