# Week 08 - Faker PHP Pair Programming

This repository contains PHP scripts that utilize the [Faker](https://fakerphp.org/) library to generate fake data for user profiles, books, and user accounts. The data is localized for the **Philippines** and displayed in formatted tables with **Bootstrap styling**.

---

## 📌 Project Requirements

1. **Generate Fake User Profiles (Localized for the Philippines)**
2. **Generate Fake Book Records**
3. **Develop a User Accounts Table with UUID and Secure Passwords**

---

## 🚀 Setup & Installation

### **1. Clone the Repository**
```sh
$ git clone https://github.com/ejlanuza123/week08-faker-pair.git
$ cd week08-faker-pair
```

### **2. Install Dependencies**
Make sure you have **Composer** installed. If not, install it from [https://getcomposer.org](https://getcomposer.org/).

```sh
$ composer require fakerphp/faker
```

### **3. Run the PHP Scripts**
Ensure you have a local server (XAMPP, Laragon, etc.) running. Place the PHP files in your `htdocs` (or equivalent) and access them via your browser.

---

## 📌 Task Breakdown

### **1. Generate Fake User Profiles**
#### 🏷️ **File:** `users.php`

This script generates **5 fake user profiles** with the following details:
- Full Name (Filipino names)
- Email Address
- Phone Number (PH format: `+63 9XX XXX XXXX`)
- Complete Address (Province & City in the Philippines)
- Birthdate (`YYYY-MM-DD` format)
- Job Title

**✅ Features:**
- Uses Faker to generate Filipino names and Philippine addresses.
- Displays data in a **Bootstrap-styled table**.

### **2. Generate Fake Book Records**
#### 📖 **File:** `books.php`

This script generates **15 fake book records** with:
- **Title** (Random lorem words)
- **Author** (Random full name)
- **Genre** (Chosen from predefined genres)
- **Publication Year** (Between **1900 - 2024**)
- **ISBN** (Random 13-digit number)
- **Summary** (Short Lorem Ipsum paragraph)

**📌 Predefined Genres:**
- Fiction, Mystery, Science Fiction, Fantasy, Romance, Thriller, Historical, Horror

**✅ Features:**
- Generates **randomized book data**.
- Ensures publication year stays between **1900-2024**.
- Formats data in a **Bootstrap table**.

### **3. Generate Fake User Accounts (With UUID & SHA-256 Encryption)**
#### 🔐 **File:** `accounts.php`

This script generates **10 fake user accounts** with:
- **User ID** (Generated as a UUID)
- **Full Name** (Random name)
- **Email Address**
- **Username** (Lowercase version of email's first part)
- **Password** (Random password, **hashed with SHA-256**)
- **Account Created** (Random date **between 2023 - 2024**)

**✅ Features:**
- Uses **UUID** instead of auto-increment IDs.
- Passwords are stored **securely with SHA-256 encryption**.
- Ensures **no future dates** for account creation.

---

## 📌 Usage Instructions

1. Start your local server.
2. Open your browser and navigate to the PHP files:
   - **User Profiles:** `http://localhost/week08-faker-pair/users.php`
   - **Books Table:** `http://localhost/week08-faker-pair/books.php`
   - **User Accounts:** `http://localhost/week08-faker-pair/accounts.php`

---

## 📌 Technologies Used
- **PHP** (Faker library)
- **Bootstrap** (for table styling)
- **SHA-256** (for password encryption)

---

## 📌 Contributors
- **[Your Name]** (@your-github-username)
- **[Pair's Name]** (@pair-github-username)

---

## 📌 License
This project is licensed under the **MIT License**. Feel free to modify and use it as needed.

---

✅ **Enjoy coding with Faker!** 🚀

