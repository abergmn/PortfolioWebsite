<?php

$conn = new PDO("sqlite:portfolio_db.sqlite");
$conn->exec("CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    email TEXT,
    message TEXT
)");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)");
    $stmt->execute([
        ":name" => $_POST["name"] ?? '',
        ":email" => $_POST["email"] ?? '',
        ":message" => $_POST["message"] ?? ''
    ]);
}

header("Location: contact.html");
exit;

?>
