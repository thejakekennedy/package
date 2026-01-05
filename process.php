<?php
// --- DATABASE CONFIGURATION (EDIT THIS) ---
$servername = "localhost";
$username = "your_db_username"; // You get this from hosting
$password = "your_db_password"; // You set this in hosting
$dbname = "your_db_name";       // You set this in hosting

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize and Assign Variables
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    
    $del_street = $conn->real_escape_string($_POST['del_street']);
    $del_city = $conn->real_escape_string($_POST['del_city']);
    $del_state = $conn->real_escape_string($_POST['del_state']);
    $del_country = $conn->real_escape_string($_POST['del_country']);
    $del_zip = $conn->real_escape_string($_POST['del_zip']);
    
    $deliveryTime = $conn->real_escape_string($_POST['deliveryTime']);
    $deliveryNumber = $conn->real_escape_string($_POST['deliveryNumber']);
    $deliveryMonth = $conn->real_escape_string($_POST['deliveryMonth']);
    $deliveryYear = $conn->real_escape_string($_POST['deliveryYear']);
    $referralCode = $conn->real_escape_string($_POST['referralCode']);
    $requestDetails = $conn->real_escape_string($_POST['requestDetails']);

    $bill_street = $conn->real_escape_string($_POST['bill_street']);
    $bill_city = $conn->real_escape_string($_POST['bill_city']);
    $bill_state = $conn->real_escape_string($_POST['bill_state']);
    $bill_country = $conn->real_escape_string($_POST['bill_country']);
    $bill_zip = $conn->real_escape_string($_POST['bill_zip']);

    // Prepare SQL Insert
    $sql = "INSERT INTO delivery_requests 
    (first_name, last_name, phone, email, del_street, del_city, del_state, del_country, del_zip, delivery_time, delivery_number, delivery_month, delivery_year, referral_code, request_details, bill_street, bill_city, bill_state, bill_country, bill_zip)
    VALUES ('$firstName', '$lastName', '$phone', '$email', '$del_street', '$del_city', '$del_state', '$del_country', '$del_zip', '$deliveryTime', '$deliveryNumber', '$deliveryMonth', '$deliveryYear', '$referralCode', '$requestDetails', '$bill_street', '$bill_city', '$bill_state', '$bill_country', '$bill_zip')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1 style='color: #8dc041; text-align:center;'>Request Saved Successfully!</h1>";
        echo "<p style='text-align:center;'>We have received your delivery details.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>