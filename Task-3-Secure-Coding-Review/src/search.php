<?php
require_once __DIR__ . '/db.php';

$results = [];
$username = '';
$message = '';

if (isset($_GET['username'])) {
    $username = trim($_GET['username']);

    if (strlen($username) > 50) {
        $message = "Search term is too long.";
    } else {
        $sql = "SELECT username, email FROM users
                WHERE username LIKE :username";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => '%' . $username . '%'
        ]);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Search</title>
</head>
<body>
    <h1>Search for Users</h1>

    <form method="GET">
        <label>Username:</label>
        <input type="text" name="username" maxlength="50"
               value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>">
        <button type="submit">Search</button>
    </form>

    <p><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p>

    <h2>Search Results</h2>

    <?php foreach ($results as $user): ?>
        <p>
            Username: <?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?> |
            Email: <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>
        </p>
    <?php endforeach; ?>
</body>
</html>
