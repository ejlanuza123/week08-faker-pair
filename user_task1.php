<?php
require 'vendor/autoload.php'; // Load Faker

use Faker\Factory;

// Initialize Faker with Filipino locale
$faker = Factory::create('fil_PH');

// Generate 5 fake user profiles
$users = [];
for ($i = 0; $i < 5; $i++) {
    $users[] = [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => '+63 9' . $faker->randomNumber(2, true) . ' ' . $faker->randomNumber(3, true) . ' ' . $faker->randomNumber(4, true),
        'address' => $faker->address,
        'birthdate' => $faker->date('Y-m-d'),
        'job' => $faker->jobTitle
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake User Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Fake User Profiles (Philippines)</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Complete Address</th>
                <th>Birthdate</th>
                <th>Job Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user) : ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['phone']) ?></td>
                    <td><?= htmlspecialchars($user['address']) ?></td>
                    <td><?= htmlspecialchars($user['birthdate']) ?></td>
                    <td><?= htmlspecialchars($user['job']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
