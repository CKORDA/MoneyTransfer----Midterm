<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications Page</title>
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
.answer {
            margin-bottom: 20px;
            display: none;
        }
</style>

<body>

<div id="notifications">
<?=
	require_once('pageStyle.html');
	require_once('menu.html');
	
?>
</div>
<h1>Notifications Page</h1>
  
<ul id="notifications-list">
        <!-- Notifications will be dynamically added here using JavaScript -->
    </ul>
<?php
// connect to your database

$host = 'localhost';
$db = 'moneyTransfer';
$user = 'root';
$pass = 'root';

$connection = new mysqli($host, $user, $pass, $db);
if (!$connection) {
    die("Connection failed: " . $connection->connect_error);
}

//echo "Connected to the database successfully!";

// Fetch notifications using MySQLi
$query = "SELECT * FROM notifications";// WHERE status = 0 ORDER BY timestamp DESC";
$result = $connection->query($query);

if ($result) {
    // Fetch the data as an associative array
    $notifications = $result->fetch_all(MYSQLI_ASSOC);
	
    // Process the notifications as needed
    foreach ($notifications as $i => $value) {
		$title = $notifications[$i]['title'];
		$message = $notifications[$i]['message'];

		echo '<div class="notifications-container">';
		echo '  <div class="notif-item">';
		echo '      <div class="notification" onclick="toggleAnswer(' . $i . ')">' . $title . '</div>';
		echo '      <div class="message" id="message_' . $i . '" style="display:none;">';
		echo '          <p>' . $message . '</p>';
		echo '      </div>';
		echo '  </div>';
		echo '</div>';
	}
	

    // Close the result set
    $result->close();
} else {
    echo "Error executing query: " . $connection->error;
}

// Return notifications as JSON

// Close the MySQLi connection
$connection->close();
?>
<script>
function toggleAnswer(index) {
    var messageElement = document.getElementById('message_' + index);
    messageElement.style.display = (messageElement.style.display === 'none') ? 'block' : 'none';
}
</script>

</body>
</html>