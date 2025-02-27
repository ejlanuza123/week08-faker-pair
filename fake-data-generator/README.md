# Fake Data Generator

This PHP script generates fake data for a MySQL database using the **Faker** library. The data is tailored to the Philippine locale and populates three tables: `Office`, `Employee`, and `Transaction`.

---

## Table of Contents
1. [Prerequisites](#prerequisites)
2. [Setup Instructions](#setup-instructions)
3. [Database Schema](#database-schema)
4. [Running the Script](#running-the-script)
5. [Troubleshooting](#troubleshooting)
6. [License](#license)

---

## Prerequisites

Before running the script, ensure you have the following installed:

1. **PHP** (version 7.4 or higher)
2. **MySQL** (running on port 3307 or update the script accordingly)
3. **Composer** (for managing PHP dependencies)
4. **Git** (optional, for cloning the repository)

---

## Setup Instructions

### 1. Clone the Repository
Clone this repository to your local machine:
```bash
git clone https://github.com/ejlanuza123/fake-data-generator.git
cd fake-data-generator
```

### 2. Install Dependencies
Install the required PHP dependencies using Composer:
```bash
composer install
```

This will install the `fakerphp/faker` library.

### 3. Set Up the Database
1. **Create the Database**:
   Log in to MySQL and create the `CompanyDB` database:
   ```sql
   CREATE DATABASE CompanyDB;
   ```

2. **Create the Tables**:
   Run the following SQL script to create the `Office`, `Employee`, and `Transaction` tables:
   ```sql
   USE CompanyDB;

   -- Create Office Table
   CREATE TABLE Office (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       contactnum VARCHAR(20) NOT NULL,
       email VARCHAR(255) NOT NULL,
       address VARCHAR(255) NOT NULL,
       city VARCHAR(100) NOT NULL,
       country VARCHAR(100) NOT NULL DEFAULT 'Philippines',
       postal VARCHAR(10) NOT NULL
   );

   -- Create Employee Table
   CREATE TABLE Employee (
       id INT AUTO_INCREMENT PRIMARY KEY,
       lastname VARCHAR(100) NOT NULL,
       firstname VARCHAR(100) NOT NULL,
       office_id INT NOT NULL,
       address VARCHAR(255) NOT NULL,
       FOREIGN KEY (office_id) REFERENCES Office(id)
   );

   -- Create Transaction Table
   CREATE TABLE Transaction (
       id INT AUTO_INCREMENT PRIMARY KEY,
       employee_id INT NOT NULL,
       office_id INT NOT NULL,
       datelog DATETIME NOT NULL,
       action VARCHAR(50) NOT NULL,
       remarks TEXT NOT NULL,
       documentcode VARCHAR(50) NOT NULL,
       FOREIGN KEY (employee_id) REFERENCES Employee(id),
       FOREIGN KEY (office_id) REFERENCES Office(id)
   );
   ```

3. **Verify the Tables**:
   Ensure the tables were created successfully:
   ```sql
   SHOW TABLES;
   ```

---

## Running the Script

### 1. Update Database Credentials
Open the `generate-fake-data.php` file and update the database connection details:
```php
$host = 'localhost';
$port = 3307; // Update if your MySQL server uses a different port
$dbname = 'CompanyDB';
$username = 'your_username'; // Replace with your MySQL username
$password = 'your_password'; // Replace with your MySQL password
```

### 2. Run the Script
Execute the script to generate and insert fake data into the database:
```bash
php generate-fake-data.php
```

### 3. Verify the Data
Check the database to ensure the data was inserted successfully:
```sql
USE CompanyDB;

-- Check Offices
SELECT * FROM Office LIMIT 10;

-- Check Employees
SELECT * FROM Employee LIMIT 10;

-- Check Transactions
SELECT * FROM Transaction LIMIT 10;
```

---

## Database Schema

### Office Table
- `id`: Primary key
- `name`: Office name
- `contactnum`: Contact number
- `email`: Office email
- `address`: Office address
- `city`: City
- `country`: Country (default: Philippines)
- `postal`: Postal code

### Employee Table
- `id`: Primary key
- `lastname`: Employee's last name
- `firstname`: Employee's first name
- `office_id`: Foreign key referencing `Office(id)`
- `address`: Employee's address

### Transaction Table
- `id`: Primary key
- `employee_id`: Foreign key referencing `Employee(id)`
- `office_id`: Foreign key referencing `Office(id)`
- `datelog`: Date and time of the transaction
- `action`: Action performed (e.g., Created, Updated, Deleted)
- `remarks`: Remarks or notes
- `documentcode`: Unique document code

---

## Troubleshooting

### 1. Database Connection Issues
- **Error**: `Unknown database 'CompanyDB'`
  - Ensure the database exists and the name matches exactly (case-sensitive).
  - Verify the database name in the PHP script.

- **Error**: `Access denied for user`
  - Ensure the MySQL user has access to the `CompanyDB` database.
  - Grant permissions:
    ```sql
    GRANT ALL PRIVILEGES ON CompanyDB.* TO 'your_username'@'localhost';
    FLUSH PRIVILEGES;
    ```

### 2. Faker Library Issues
- **Error**: `join(): Argument #2 must be of type ?array, string given`
  - Update the Faker library to `fakerphp/faker`:
    ```bash
    composer require fakerphp/faker
    ```

### 3. MySQL Port Issues
- If MySQL is running on a different port (e.g., 3307), update the `$port` variable in the PHP script.

---


## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any improvements.

---

## Contact

For questions or feedback, please contact [Rodrigo Lanuza III](mailto:ejlanuza0123@gmail.com).

---

Enjoy generating fake data! 🚀
