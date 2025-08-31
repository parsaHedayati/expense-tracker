Expense Tracker
A simple and intuitive web-based expense tracker to help you monitor your spending and manage your budget. This application allows you to log daily expenses and visualize your spending habits through a clear and interactive chart.

Features
Total Expenses: Get a quick summary of your total spending.

Daily Average: See your average spending per day to understand your spending rate.

Category Breakdown: Categorize your expenses to see where your money goes.

Interactive Chart: A dynamic pie chart provides a visual breakdown of your spending by category.

Simple Logging Form: Easily add new expenses with a clean and straightforward form.

Technology Stack
Backend: PHP

Frontend: HTML, CSS, JavaScript

Database: MySQL

Charting Library: Chart.js

How to Get Started
Prerequisites
You need a web server environment with PHP and MySQL installed, such as XAMPP, WAMP, or MAMP.

Installation
Clone the repository from GitHub to your local machine:

git clone [https://github.com/parsaHedayati/expense-tracker.git](https://github.com/parsaHedayati/expense-tracker.git)

Set up the database:

Create a MySQL database named expense_tracker.

Import the following SQL schema to create the expenses table:

CREATE TABLE `expenses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(255) DEFAULT NULL,
  `amount` DECIMAL(10, 2) NOT NULL,
  `date` DATE NOT NULL,
  `type` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

Configure the database connection:

Update your Dbh.php file with your database credentials.

Place the files in your server's root directory (e.g., htdocs for XAMPP).

Run the application:

Open your web browser and navigate to http://localhost/expense-tracker.
