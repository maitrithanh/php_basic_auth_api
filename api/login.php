<?php 
header("Content-Type: application/json");
require_once("../config/database.php");

$data = json_decode(file_get_contents("php://input"), true);

if(!isset($data["email"]) || !isset($data["password"])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing fields']);
    exit;
}

$email = $data['email'];
$password = $data['password'];

$stmt = $pdo->prepare('SELECt * FROM users where email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();

if($user && password_verify($password, $user['password'])) {
    echo json_encode([
        'massage' => 'login successful',
        'user' => [
            'id'=> $user['id'],
            'name'=> $user['name'],
            'email'=> $user['email'],
        ]
    ]);
} else {
    http_response_code(401);
    echo json_encode(['error'=> 'Invalid credentials']);
}