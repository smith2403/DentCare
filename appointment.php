<?php
// Include the database configuration file
include 'dbconfig.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $service = $_POST['service'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $appointmentDate = $_POST['date'];
    $appointmentTime = $_POST['time'];

    // Check if the appointment limit is reached for the selected date
    $maxAppointmentsPerDate = 4; // Set your desired limit

    if (isAppointmentLimitExceeded($conn, $appointmentDate, $maxAppointmentsPerDate)) {
        // Sorry, the limit for appointments on this date is reached
        echo 'Sorry, the appointment limit for this date is reached. Please choose another date or time.';
    } else {
        // Insert the appointment into the database
        $sql = "INSERT INTO `appointment` (`service`, `name`, `email`, `date`, `time`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $service, $name, $email, $appointmentDate, $appointmentTime);

        if ($stmt->execute()) {
            // Appointment made successfully
            header("Location: thankyou.html");
        } else {
            // Error in appointment creation
            echo 'Error in appointment creation.';
        }

        $stmt->close();
    }
}

// Function to check if the appointment limit is exceeded for a particular date
function isAppointmentLimitExceeded($conn, $appointmentDate, $maxAppointmentsPerDate) {
    $result = $conn->query("SELECT COUNT(*) AS `appointment_count` FROM `appointment` WHERE `date` = '$appointmentDate'");
    $row = $result->fetch_assoc();

    return $row['appointment_count'] >= $maxAppointmentsPerDate;
}

// Close the database connection
$conn->close();
?>
