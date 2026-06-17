<?php
session_start();
 
require_once __DIR__ . '/../Model/viewUsers_model.php';
 
if (!isset($_SESSION['user_id'])) {
    header('Location: ../View/login_view.php');
    exit;
}
 
try {
    $db = new PDO('mysql:host=localhost;dbname=mvctrial;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
 
$userModel = new User($db);
$users = $userModel->getAllUsers();
 
require __DIR__ . '/../View/viewUsers_view.php';