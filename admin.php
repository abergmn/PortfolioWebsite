<?php

session_start();

if (empty($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$conn = new PDO("sqlite:portfolio_db.sqlite");

$conn->exec("CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    email TEXT,
    message TEXT
)");

// insert example entrys if table is empty
$count = $conn->query("SELECT COUNT(*) FROM messages")->fetchColumn();
if ($count == 0) {
    $sample_messages = [
        ["name" => "John Doe 1", "email" => "johndoe1@example.com", "message" => "Hi, I loved your portfolio!"],
        ["name" => "Jane Doe 1", "email" => "janedoe1@example.com", "message" => "Can you share more details about how you made your site?"],
        ["name" => "Jane Doe 2", "email" => "janedoe2@example.com", "message" => "Great website!"],
        ["name" => "John Doe 2", "email" => "johndoe2@example.com", "message" => "I want to hire you for a project."],
        ["name" => "John Doe 3", "email" => "johndoe3@example.com", "message" => "Do you have a blog?"]
    ];

    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)");
    foreach ($sample_messages as $msg) {
        $stmt->execute([
            ":name" => $msg["name"],
            ":email" => $msg["email"],
            ":message" => $msg["message"]
        ]);
    }
}

$result = $conn->query("SELECT * FROM messages");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel</title>
    </head>
    <body>
        <h2>Admin Panel</h2>
        <p><a href="logout.php">Logout</a></p>

        <h3>Messages Received</h3>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
            <?php foreach ($result as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row["name"]) ?></td>
                <td><?= htmlspecialchars($row["email"]) ?></td>
                <td><?= htmlspecialchars($row["message"]) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
