<?php

// Connect to the database
require_once __DIR__ . '/provision/db_connect_NO_COMMIT.php';
$conn = OpenCon();

// Initialize variables
$player_name = "";
$player_profile_pic = "placeholder.jpg";


function get_player_character($player_name) {

    // Cleanse the player name
    $player_name = htmlspecialchars($player_name);
    
    // Get the player character
    global $conn;
    $sql = "SELECT * FROM players WHERE name = '$player_name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return "Player does not exist.";
    } 

    return $player_name;
}

function create_player($player_name) {

    // Cleanse the player name
    $new_player_name = htmlspecialchars($player_name);
    // Remove leading and trailing spaces
    $new_player_name = trim($new_player_name);
    // Replace multiple spaces with a single space
    $new_player_name = preg_replace('/\s+/', ' ', $new_player_name);
    // Capitalize the first letter of each word
    $new_player_name = ucwords($new_player_name);
    
    // Check if player already exists
    global $conn;
    $sql = "SELECT * FROM players WHERE name = '$new_player_name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Player already exists.";
        return "Cannot create player with this name, as there is already another with the same name.";
    } 

    // Make the player with given name
    $sql = "INSERT INTO players (name, profile_pic) VALUES ('$new_player_name', 'placeholder.jpg')";
    $result = $conn->query($sql);
    return "Player created successfully.";
}

function update_player($player_name) {

}

function delete_player($player_name) {

}

function set_player_character($player_name, $character_id) {

}

function delete_player_character($player_name) {

}

function get_player_profile_pic($player_name) {

}

function set_player_profile_pic($player_name, $profile_pic) {

}