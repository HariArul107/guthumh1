<?php
function test_input($data)
{
    if (is_array($data)) return $data;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$fnameErr = $lnameErr = $emailErr = $phoneErr = $dobErr = $genderErr = $yopErr = $skillsErr = $addressErr = "";
$fname = $lname = $email = $phone = $dob = $gender = $yop = $skills = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // First Name
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['Fname'])) {
        $fnameErr = "Invalid characters";
    } else {
        $fname = test_input($_POST['Fname']);
    }

    // Last Name
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['Lname'])) {
        $lnameErr = "Invalid characters";
    } else {
        $lname = test_input($_POST['Lname']);
    }

    // Email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email";
    } else {
        $email = test_input($_POST['email']);
    }

    // Phone
    if (!preg_match("/^[0-9]{10}$/", $_POST['phone'])) {
        $phoneErr = "Invalid phone";
    } else {
        $phone = test_input($_POST['phone']);
    }

    // DOB
    if (empty($_POST['dob'])) {
        $dobErr = "Required";
    } else {
        $dob = test_input($_POST['dob']);
    }

    // Gender
    if (empty($_POST['gender'])) {
        $genderErr = "Required";
    } else {
        $gender = test_input($_POST['gender']);
    }

    // YOP
    if ($_POST['YOP'] == "disabled") {
        $yopErr = "Select year";
    } else {
        $yop = test_input($_POST['YOP']);
    }

    // Skills
    if (empty($_POST['skills'])) {
        $skillsErr = "Select at least one";
    } else {
        $skills = $_POST['skills'];
    }

    // Address
    if (empty($_POST['address'])) {
        $addressErr = "Required";
    } else {
        $address = test_input($_POST['address']);
    }

    // Check if any errors
    if ($fnameErr || $lnameErr || $emailErr || $phoneErr || $dobErr || $genderErr || $yopErr || $skillsErr || $addressErr) {
        echo json_encode([
            "success" => false,
            "fnameErr" => $fnameErr,
            "lnameErr" => $lnameErr,
            "emailErr" => $emailErr,
            "phoneErr" => $phoneErr,
            "dobErr" => $dobErr,
            "genderErr" => $genderErr,
            "yopErr" => $yopErr,
            "skillsErr" => $skillsErr,
            "addressErr" => $addressErr
        ]);
        exit;
    }

    // Success Output
    $output = "<h2>Your Input:</h2>";
    $output .= "<p><strong>Name:</strong> $fname $lname</p>";
    $output .= "<p><strong>Email:</strong> $email</p>";
    $output .= "<p><strong>Phone:</strong> $phone</p>";
    $output .= "<p><strong>DOB:</strong> $dob</p>";
    $output .= "<p><strong>Gender:</strong> $gender</p>";
    $output .= "<p><strong>Year of Passing:</strong> $yop</p>";
    $output .= "<p><strong>Skills:</strong></p><ul>";

    foreach ($skills as $skill) {
        $output .= "<li>$skill</li>";
    }
    $output .= "</ul>";
    $output .= "<p><strong>Address:</strong> $address</p>";
    echo $output;
}
