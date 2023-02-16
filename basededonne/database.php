<?php

// Connexion à la base de données
$host = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Vérification de la connexion à la base de données
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fonction pour lire les données de la table des projets
function readProjects() {
    global $conn;

    $sql = "SELECT * FROM projects";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return false;
    }
}

// Fonction pour ajouter un projet à la table des projets
function addProject($project_name, $project_desc) {
    global $conn;

    $sql = "INSERT INTO projects (project_name, project_desc) VALUES ('$project_name', '$project_desc')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Fonction pour lire les données de la table des utilisateurs
function readUsers() {
    global $conn;

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return false;
    }
}

// Fonction pour ajouter un utilisateur à la table des utilisateurs
function addUser($username, $email, $password) {
    global $conn;
    echo "test"
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

?>

