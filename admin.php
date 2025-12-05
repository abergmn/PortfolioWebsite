<?php

// Connect to SQLite (database file will be created if it doesn't exist)
$conn = new PDO("sqlite:portfolio_db.sqlite");

// Create table if it doesn't exist (optional, for first run)
$conn->exec("CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    email TEXT,
    message TEXT
)");

$sample_messages = [
    ["name" => "John Doe 1", "email" => "johndoe1@example.com", "message" => "Hi — I loved your portfolio!"],
    ["name" => "Jane Doe 1", "email" => "janedoe1@example.com", "message" => "Can you share more details about how you made your site?"],
    ["name" => "Jane Doe 2", "email" => "janedoe2@example.com", "message" => "Great website!"],
    ["name" => "John Doe 2", "email" => "johndoe2@example.com", "message" => "I want to hire you for a project."],
    ["name" => "John Doe 3", "email" => "johndoe3@example.com", "message" => "Do you have a blog?"]
];

$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)");

// insert sample messages
foreach ($sample_messages as $msg) {
    $stmt->execute([
        ":name" => $msg["name"],
        ":email" => $msg["email"],
        ":message" => $msg["message"]
    ]);
}

// get messages
$result = $conn->query("SELECT * FROM messages");

echo "<h2>Messages Received</h2>";
echo "<table border='1'>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>";

foreach ($result as $row) {
    echo "<tr>
            <td>" . htmlspecialchars($row["name"]) . "</td>
            <td>" . htmlspecialchars($row["email"]) . "</td>
            <td>" . htmlspecialchars($row["message"]) . "</td>
          </tr>";
}

echo "</table>";

?>
