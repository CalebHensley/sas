<?php
$host = 'localhost';
$username = 'u676936630_sally';
$password = 'SallyPhase4';
$dbname = 'u676936630_salamanders';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$sql = "INSERT INTO test_users (username, email) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ss", $username, $email);

$username = 'testUser';
$email = 'test@example.com';

mysqli_stmt_execute($stmt);
echo "New record created successfully";

mysqli_stmt_close($stmt);
mysqli_close($conn);