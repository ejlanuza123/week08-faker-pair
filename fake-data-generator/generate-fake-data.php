<?php

require 'vendor/autoload.php';

use Faker\Factory;

// Database configuration
$host = 'localhost';
$port = '3307'; // Specify the port here
$dbname = 'CompanyDB'; // Ensure this matches the actual database name
$username = 'root';
$password = 'lanuza';

try {
    // Include the port in the DSN (Data Source Name)
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully to the database!";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Initialize Faker with Philippine locale
$faker = Factory::create('en_PH');

// Generate Offices (50 rows)
$offices = [];
for ($i = 1; $i <= 50; $i++) {
    $offices[] = [
        'name' => $faker->company,
        'contactnum' => $faker->phoneNumber,
        'email' => $faker->companyEmail,
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => 'Philippines',
        'postal' => $faker->postcode,
    ];
}

// Insert Offices into the database
$stmt = $pdo->prepare("INSERT INTO Office (name, contactnum, email, address, city, country, postal) VALUES (:name, :contactnum, :email, :address, :city, :country, :postal)");
foreach ($offices as $office) {
    $stmt->execute($office);
}

// Generate Employees (200 rows)
$employees = [];
for ($i = 1; $i <= 200; $i++) {
    $employees[] = [
        'lastname' => $faker->lastName,
        'firstname' => $faker->firstName,
        'office_id' => $faker->numberBetween(1, 50), // Random office_id from 1 to 50
        'address' => $faker->address,
    ];
}

// Insert Employees into the database
$stmt = $pdo->prepare("INSERT INTO Employee (lastname, firstname, office_id, address) VALUES (:lastname, :firstname, :office_id, :address)");
foreach ($employees as $employee) {
    $stmt->execute($employee);
}

// Generate Transactions (500 rows)
$transactions = [];
for ($i = 1; $i <= 500; $i++) {
    $transactions[] = [
        'employee_id' => $faker->numberBetween(1, 200), // Random employee_id from 1 to 200
        'office_id' => $faker->numberBetween(1, 50), // Random office_id from 1 to 50
        'datelog' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'), // No future dates
        'action' => $faker->randomElement(['Created', 'Updated', 'Deleted']),
        'remarks' => $faker->sentence,
        'documentcode' => $faker->unique()->bothify('DOC-####-????'),
    ];
}

// Insert Transactions into the database
$stmt = $pdo->prepare("INSERT INTO Transaction (employee_id, office_id, datelog, action, remarks, documentcode) VALUES (:employee_id, :office_id, :datelog, :action, :remarks, :documentcode)");
foreach ($transactions as $transaction) {
    $stmt->execute($transaction);
}

echo "Fake data generation completed successfully!";