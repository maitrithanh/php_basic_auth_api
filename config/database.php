<?php 
$host = 'localhost';
$db = 'auth_php';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { 
    http_response_code(500);
    echo json_encode(["error"=> "Database connection failed: ".$e->getMessage()]);
    exit;
}