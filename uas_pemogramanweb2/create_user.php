<?php
require 'db.php';

function createUser($nim, $password) {
    global $pdo;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (nim, password) VALUES (?, ?)');
    $stmt->execute([$nim, $hashedPassword]);
}

// Menambahkan pengguna baru
createUser('201011400212', 'password123');

echo "User created successfully.";
?>
