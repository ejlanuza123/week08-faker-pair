<?php
require 'vendor/autoload.php'; // Load Faker

use Faker\Factory;

// Initialize Faker
$faker = Factory::create();

// Function to generate a UUID
function generateUUID() {
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

// Generate 10 fake user accounts
$users = [];
for ($i = 0; $i < 10; $i++) {
    $email = $faker->email;
    $username = explode('@', $email)[0]; // Extracts the part before '@'

    $users[] = [
        'user_id' => generateUUID(),
        'full_name' => $faker->name,
        'email' => $email,
        'username' => strtolower($username),
        'password' => hash('sha256', $faker->password), // Encrypts password using SHA-256
        'account_created' => $faker->dateTimeBetween('2023-01-01', '2023-12-31')->format('Y-m-d H:i:s')

    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake User Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        td {
            word-break: break-word;
        }
    </style>
</head>
<body class="container mt-5">
    <h2 class="mb-4">Fake User Accounts</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password (SHA-256)</th>
                <th>Account Created</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user) : ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($user['user_id']) ?></td>
                    <td><?= htmlspecialchars($user['full_name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['password']) ?></td>
                    <td><?= htmlspecialchars($user['account_created']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
