<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

date_default_timezone_set('Asia/Jakarta');
$currentDateTime = date('d M Y H:i:s');

$nim = '201011400212'; // Ganti dengan NIM Anda atau ambil dari session

$teams = [
    ['name' => 'Jerman', 'win' => 1, 'draw' => 1, 'lose' => 0, 'points' => 7],
    ['name' => 'Swiss', 'win' => 1, 'draw' => 2, 'lose' => 0, 'points' => 5],
    ['name' => 'Hongaria', 'win' => 1, 'draw' => 0, 'lose' => 2, 'points' => 3],
    ['name' => 'Skotlandia', 'win' => 0, 'draw' => 1, 'lose' => 2, 'points' => 1]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Group A Standings</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Data Group A</h1>
    <p>Per <?php echo $currentDateTime; ?></p>
    <p>NIM: <?php echo $nim; ?></p>

    <table border="1">
        <thead>
            <tr>
                <th>Tim</th>
                <th>Menang</th>
                <th>Seri</th>
                <th>Kalah</th>
                <th>Poin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams as $team): ?>
                <tr>
                    <td><?php echo $team['name']; ?></td>
                    <td><?php echo $team['win']; ?></td>
                    <td><?php echo $team['draw']; ?></td>
                    <td><?php echo $team['lose']; ?></td>
                    <td><?php echo $team['points']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
