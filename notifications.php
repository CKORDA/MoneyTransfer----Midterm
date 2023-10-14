<?php
// connect to your database

$host = 'localhost';
$db = 'moneyTransfer';
$user = '';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Fetch notifications
$query = "SELECT * FROM notifications WHERE status = 0 ORDER BY timestamp DESC";
$stmt = $pdo->prepare($query);
$stmt->execute();
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mark notifications as read
foreach ($notifications as $notification) {
    $updateQuery = "UPDATE notifications SET status = 1 WHERE id = :id";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindParam(':id', $notification['id']);
    $updateStmt->execute();
}

// Return notifications as JSON
echo json_encode($notifications);
?>
