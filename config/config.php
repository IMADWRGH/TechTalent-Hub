<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbTechTalent_Hub";
$port = 3307;
$charset = "utf8mb4";

// DSN (Data Source Name)
$dsn = "mysql:host=$servername;port=$port;dbname=$dbname;charset=$charset";

// PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::ATTR_PERSISTENT         => false,
];

// Create PDO instance
try {
    $pdo = new PDO($dsn, $username, $password, $options);
    $pdo->exec("SET sql_mode = 'STRICT_ALL_TABLES'");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Database connection successful!";
} catch (\PDOException $msg) {
    echo ("Database connection failed: " . $msg->getMessage());
}


define("APP_URL", "http://localhost/TechTalent%20Hub");
