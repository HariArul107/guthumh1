<?php
session_start();
$fnameErr = $lnameErr = $emailErr = $phoneErr = $dobErr = $genderErr = $yopErr = $skillsErr = $addressErr = "";
$fname = $lname = $email = $phone = $dob = $gender = $yop = $skills = $address = "";
function test_input($data)
{
    if (is_array($data)) {
        return $data;
    }
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['Fname'])) {
        $fnameErr = "Name contains invalid characters";
    } else {
        $fname = test_input($_POST["Fname"]);
    }
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['Lname'])) {
        $lnameErr = "Name contains invalid characters";
    } else {
        $lname = test_input($_POST["Lname"]);
    }
    if (! (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $emailErr = "Invalid email format";
    } else {
        $email = test_input($_POST["email"]);
    }
    if (!preg_match("/^[0-9]{10}$/", $_POST['phone'])) {
        $phoneErr = "Invalid phone number";
    } else {
        $phone = test_input($_POST["phone"]);
    }
    if (empty($_POST['dob'])) {
        $dobErr = "Date of birth is required";
    } else {
        $dob = test_input($_POST["dob"]);
    }
    if (empty($_POST['gender'])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
    if ($_POST["YOP"] == "disabled") {
        $yopErr = "Please select year of passing is required";
    } else {
        $yop = test_input($_POST["YOP"]);
    }
    if (empty($_POST['skills'])) {
        $skillsErr = "At least one skill is required";
    } else {
        $skills = test_input($_POST["skills"]);
    }
    if (empty($_POST['address'])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- <form method="post" action="index.php"> -->
    <div class="form-container">
        <form method="post" action="form.php">
            <h2>Registration Form</h2>

            <label for="Fname">First Name:</label>
            <input type="text" id="Fname" name="Fname" required value="<?php echo $fname ?>">
            <span class="error"><?php echo $fnameErr ?></span>

            <label for="Lname">Last Name:</label>
            <input type="text" id="Lname" name="Lname" required>
            <span class="error"><?php echo $lnameErr ?></span>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo $email; ?>">
            <span class="error"><?php echo $emailErr ?></span>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
            <span class="error"><?php echo $phoneErr ?></span>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
            <span class="error"><?php echo $dobErr ?></span>

            <label>Gender:</label>
            <div class="gender-box">
                <label for="male">
                    <input type="radio" id="male" name="gender" value="male" required>
                    Male</label>

                <label for="female">
                    <input type="radio" id="female" name="gender" value="female" required>
                    Female</label>
            </div>

            <label for="YOP">Year of Passing:</label>
            <select name="YOP" id="YOP">
                <option value="disabled">Select Year</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
            <span class="error"><?php echo $yopErr ?></span>

            <label for="skills">Skills:</label>
            <div class="skills-box">

                <input type="checkbox" id="html" name="skills[]" value="HTML" required>
                <label for="html">
                    HTML
                </label>

                <label for="css">
                    <input type="checkbox" id="css" name="skills[]" value="CSS">
                    CSS
                </label>

                <label for="js">
                    <input type="checkbox" id="js" name="skills[]" value="JavaScript">
                    JavaScript
                </label>
            </div>
            <span class="error"><?php echo $skillsErr ?></span>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>

</body>

</html>
<?php
if (
    $_SERVER["REQUEST_METHOD"] == "POST" &&
    empty($fnameErr) && empty($lnameErr) && empty($emailErr) && empty($phoneErr) &&
    empty($dobErr) && empty($genderErr) && empty($yopErr) && empty($skillsErr) &&
    empty($addressErr)
) {
    $_SESSION['Fname'] = $fname;
    $_SESSION['Lname'] = $lname;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['dob'] = $dob;
    $_SESSION['gender'] = $gender;
    $_SESSION['YOP'] = $yop;
    $_SESSION['skills'] = $skills;
    $_SESSION['address'] = $address;
    header("Location: home.php");
    exit;

    // echo "<h2>Your Input:</h2>";
    // echo "Name: " . $fname . " " . $lname . "<br>";
    // echo "Email: " . $email . "<br>";
    // echo "Phone Number: " . $phone . "<br>";
    // echo "Date of Birth: " . $dob . "<br>";
    // echo "Gender: " . $gender . "<br>";
    // echo "Year of Passing: " . $yop . "<br>";
    // foreach ($skills as $skill) {
    //     echo "Skill: " . $skill . "<br>";
    // }
    // echo "Addr ess: " . $address . "<br>";
}

?>