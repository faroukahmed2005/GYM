<?php
// Retrieve form data (with null coalescing operator for safety)
$fullname      = $_POST['fullname']      ?? '';
$phone         = $_POST['phone']         ?? '';
$telegram      = $_POST['telegram']      ?? '';
$location      = $_POST['location']      ?? '';
$weight        = $_POST['weight']        ?? 0;
$weight_date   = $_POST['weight_date']   ?? '';
$height        = $_POST['height']        ?? '';
$gender        = $_POST['gender']        ?? '';
$meals         = $_POST['meals']         ?? '';
$workout_days  = $_POST['Work_Days']     ?? '';

// Handle the fitness goals data safely
if (isset($_POST['goal'])) {
    if (is_array($_POST['goal'])) {
        $fitness_goals = implode(", ", $_POST['goal']);
    } else {
        $fitness_goals = $_POST['goal'];
    }
} else {
    $fitness_goals = null;
}

// Handle file upload for 'inbody'
$target_file = "";  // default file path (empty string) if no file is uploaded
if (isset($_FILES['inbody']) && !empty($_FILES['inbody']['name'])) {
    $image = $_FILES['inbody']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    // Optionally, you can check for upload errors before moving the file.
    move_uploaded_file($_FILES['inbody']['tmp_name'], $target_file);
}

// Database connection details
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "gym";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$tableCreationQuery = "
CREATE TABLE IF NOT EXISTS gym_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255),
    phone VARCHAR(255),
    telegram VARCHAR(255),
    location VARCHAR(255),
    weight DOUBLE,
    weight_date DATE,
    height VARCHAR(255),
    gender VARCHAR(50),
    image VARCHAR(255),
    meals VARCHAR(255),
    workout_days VARCHAR(255),
    fitness_goals TEXT
)";
if (!$conn->query($tableCreationQuery)) {
    die("Error creating table: " . $conn->error);
}

// Prepare SQL query
$sql = $conn->prepare("INSERT INTO gym_members (fullname, phone, telegram, location, weight, weight_date, height, gender, image, meals, workout_days, fitness_goals) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if (!$sql) {
    die("Prepare failed: " . $conn->error);
}

// We assume weight is numeric (double) and weight_date is in a proper date format.
$sql->bind_param("sssssdssssss", $fullname, $phone, $telegram, $location, $weight, $weight_date, $height, $gender, $target_file, $meals, $workout_days, $fitness_goals);

// Execute the query
if ($sql->execute()) {
    echo "Thanks for your trust! Your data has been recorded successfully.";
} else {
    echo "Error: " . $sql->error;
}

// Close connections
$sql->close();
$conn->close();
?>
