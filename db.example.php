<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=CAT2;charset=utf8mb4", "cat2user", "CHANGE_ME",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die("Connection failed.");
}
