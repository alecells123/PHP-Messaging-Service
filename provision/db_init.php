<?php

// Connect to the database
require_once 'db_connect_NO_COMMIT.php';
$conn = OpenCon();

// Drop the players table if it exists
$sql = "DROP TABLE IF EXISTS players";
if ($conn->query($sql) === TRUE) {
    echo "Table players dropped successfully" . "\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

// Drop the profile_pics table if it exists
$sql = "DROP TABLE IF EXISTS profile_pics";
if ($conn->query($sql) === TRUE) {
    echo "Table profile_pics dropped successfully" . "\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

// Drop the characters table if it exists
$sql = "DROP TABLE IF EXISTS characters";
if ($conn->query($sql) === TRUE) {
    echo "Table characters dropped successfully" . "\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

// Drop the agendas table if it exists
$sql = "DROP TABLE IF EXISTS agendas";
if ($conn->query($sql) === TRUE) {
    echo "Table agendas dropped successfully" . "\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

// Create the agendas table
$sql = "CREATE TABLE agendas(
    name VARCHAR(255) PRIMARY KEY,
    background_info VARCHAR(511),
    agenda_info VARCHAR(511),
    reward VARCHAR(255)
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table agendas created successfully" . "\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Create the characters table
$sql = "CREATE TABLE characters(
    name VARCHAR(255) PRIMARY KEY,
    description VARCHAR(511),
    corpo_affiliation VARCHAR(255),
    current_agendas VARCHAR(255),
    FOREIGN KEY (current_agendas) REFERENCES agendas(name),
    previous_agendas VARCHAR(255),
    FOREIGN KEY (previous_agendas) REFERENCES agendas(name)
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table characters created successfully" . "\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Create the profile_pics table
$sql = "CREATE TABLE profile_pics(
    name VARCHAR(255) PRIMARY KEY,
    image_url VARCHAR(255)
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table profile_pics created successfully" . "\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Create the players table
$sql = "CREATE TABLE players(
    name VARCHAR(255) PRIMARY KEY,
    profile_pic VARCHAR(255),
    FOREIGN KEY (profile_pic) REFERENCES profile_pics(name),
    agenda_wins INT,
    agenda_losses INT,
    agenda_draws INT,
    current_character VARCHAR(255),
    FOREIGN KEY (current_character) REFERENCES characters(name)
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table players created successfully" . "\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$conn->close();
