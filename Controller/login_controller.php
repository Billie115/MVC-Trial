<?php
session_start();

require_once __DIR__ . '/../Model/login_model.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../View/login_view.php');
    exit;
}

try {
    $db = new PDO('mysql:host=localhost;dbname=mvctrial;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($username) || empty($password)) {
    header('Location: ../View/login_view.php?error=empty_fields');
    exit;
}

$userModel = new LoginModel($db);
$user = $userModel->findByUsername($username);

if (!$user || $password !== $user['PASSWORD']) {
    header('Location: ../View/login_view.php?error=invalid_credentials');
    exit;
}

$_SESSION['user_id']  = $user['ID'];
$_SESSION['username'] = $user['USERNAME'];

header('Location: ../View/mainPage_view.php');
exit;