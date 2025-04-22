<?php
$servername = "localhost";
$username = "root";
$password = ""; // Change if required
$dbname = "login_user"; // Make sure this DB exists and has the correct table

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $symptoms = $_POST['symptoms'];
    $doctor = $_POST['doctor'];

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO doctor_appointments (fullname, email, age, gender, symptoms, doctor)
                            VALUES (:fullname, :email, :age, :gender, :symptoms, :doctor)");
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':symptoms', $symptoms);
    $stmt->bindParam(':doctor', $doctor);
    $stmt->execute();

    // Redirect to index.html
    header("Location: index.html");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
