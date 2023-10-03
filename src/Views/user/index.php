<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <p>Auth: <?php echo $_SESSION['email'] ?></p>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                id: <?= $user['id'] ?>, 
                email: <?= $user['email'] ?>, 
                name: <?= $user['name'] ?>, 
                role: <?= $user['role'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>