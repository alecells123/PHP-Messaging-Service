<?php
// Connect to the database
require_once 'db_connect_NO_COMMIT.php';
$conn = OpenCon();

// Initialize variables
$player_name = "";
$player_profile_pic = "placeholder.jpg";

// Fetch player information
$sql = "SELECT name, profile_pic FROM players WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['player_name']); // Assuming player name is stored in session
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $player_name = $row["name"];
    $player_profile_pic = $row["profile_pic"];
}

$stmt->close();
$conn->close();
?>