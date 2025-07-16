<?php
header("Content-Type: application/json");
require_once("../config/database.php");

$data = json_decode(file_get_contents("php://input"), true);

if(!isset($data["name"]) || !isset($data["email"]) || !isset($data["password"])) {
    http_response_code(400);
    echo json_encode(["error"=> "Missing fields"]);
    exit;
}

$name = $data["name"];
$email = $data["email"];
$password = password_hash($data["password"], PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $password]);

    echo json_encode(["message" => "User registered successfully"]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error"=> "Email already exists or error occurred:" . $e->getMessage()]);
}