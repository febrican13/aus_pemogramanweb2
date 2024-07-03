<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$groups = $pdo->query('SELECT * FROM groups')->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $group_id = $_POST['group_id'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    $stmt = $pdo->prepare('INSERT INTO countries (name, group_id, wins, draws, losses, points) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$name, $group_id, $wins, $draws, $losses, $points]);

    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Country</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <form method="POST">
        <label for="name">Country Name</label>
        <select id="name" name="name">
            <!-- Tambahkan opsi negara UEFA di sini -->
            <option value="France">France</option>
            <option value="Germany">Germany</option>
            <option value="Italy">Italy</option>
            <!-- Tambahkan negara lainnya sesuai kebutuhan -->
        </select>

        <label for="group_id">Group</label>
        <select id="group_id" name="group_id">
            <?php foreach ($groups as $group): ?>
                <option value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>
            <?php endforeach; ?>
        </select>
        
        <label for="wins">Wins</label>
        <input type="number" id="wins" name="wins" required>
        
        <label for="draws">Draws</label>
        <input type="number" id="draws" name="draws" required>
        
        <label for="losses">Losses</label>
        <input type="number" id="losses" name="losses" required>
        
        <label for="points">Points</label>
        <input type="number" id="points" name="points" required>
        
        <button type="submit">Add Country</button>
    </form>
</body>
</html>
