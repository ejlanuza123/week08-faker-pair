<?php
require 'vendor/autoload.php'; // Load Faker

use Faker\Factory;

// Initialize Faker
$faker = Factory::create();

// Define Filipino names manually
$filipinoFirstNames = ['Juan', 'Maria', 'Jose', 'Katrina', 'Paolo', 'Angel', 'Miguel', 'Luz', 'Cesar', 'Rizalina','Rodrigo','Victor','Mark',];
$filipinoLastNames = ['Dela Cruz', 'Santos', 'Reyes', 'Garcia', 'Mendoza', 'Gonzales', 'Villanueva', 'Torres', 'Lazaro', 'Ortega','Lanuza','Dato-on','Francico'];

// Define common Philippine cities and provinces
$philippineLocations = [
    'Quezon City, Metro Manila', 'Cebu City, Cebu', 'Davao City, Davao del Sur', 'Baguio City, Benguet',
    'Iloilo City, Iloilo', 'Cagayan de Oro, Misamis Oriental', 'Zamboanga City, Zamboanga del Sur',
    'Puerto Princesa, Palawan', 'Legazpi City, Albay', 'Tagaytay City, Cavite'
];

// Generate 5 fake user profiles
$users = [];
for ($i = 0; $i < 5; $i++) {
    $firstName = $faker->randomElement($filipinoFirstNames);
    $lastName = $faker->randomElement($filipinoLastNames);
    
    $users[] = [
        'full_name' => "$lastName, $firstName",
        'email' => strtolower($firstName) . '.' . strtolower($lastName) . '@example.com',
        'phone' => '+63 9' . $faker->randomNumber(2) . ' ' . $faker->randomNumber(3) . ' ' . $faker->randomNumber(4),
        'address' => $faker->streetAddress . ', ' . $faker->randomElement($philippineLocations),
        'birthdate' => $faker->date('Y-m-d'),
        'job_title' => $faker->jobTitle
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake Filipino User Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Fake User Profiles (Philippines)</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
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
                    <td><?= htmlspecialchars($user['full_name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['phone']) ?></td>
                    <td><?= htmlspecialchars($user['address']) ?></td>
                    <td><?= htmlspecialchars($user['birthdate']) ?></td>
                    <td><?= htmlspecialchars($user['job_title']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
