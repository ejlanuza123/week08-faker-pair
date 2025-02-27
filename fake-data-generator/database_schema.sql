CREATE DATABASE IF NOT EXISTS companydb;
USE companydb;

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