<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Dashboard</h1>
    <nav>
        <a href="add_group.php">Add Group</a>
        <a href="add_country.php">Add Country</a>
        <a href="group_a.php">View Group A</a> <!-- Link ke halaman group_a.php -->
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>
