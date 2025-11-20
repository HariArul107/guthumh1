<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .container {
            background: white;
            width: 450px;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .info-box {
            margin: 10px 0;
            padding: 12px;
            background: #f9fafb;
            border-left: 4px solid #4a90e2;
            border-radius: 5px;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .value {
            color: #222;
        }

    </style>
</head>
<body>

<div class="container">
<?php
session_start();

$fname = $_SESSION['Fname'] ?? '';
$lname = $_SESSION['Lname'] ?? '';
$email = $_SESSION['email'] ?? '';
$phone = $_SESSION['phone'] ?? '';
$dob = $_SESSION['dob'] ?? '';
$gender = $_SESSION['gender'] ?? '';
$yop = $_SESSION['YOP'] ?? '';
$skills = $_SESSION['skills'] ?? [];
$address = $_SESSION['address'] ?? '';

echo "<h2>Your Input</h2>";

echo "<div class='info-box'><span class='label'>Name: </span><span class='value'>$fname $lname</span></div>";
echo "<div class='info-box'><span class='label'>Email: </span><span class='value'>$email</span></div>";
echo "<div class='info-box'><span class='label'>Phone: </span><span class='value'>$phone</span></div>";
echo "<div class='info-box'><span class='label'>Date of Birth: </span><span class='value'>$dob</span></div>";
echo "<div class='info-box'><span class='label'>Gender: </span><span class='value'>$gender</span></div>";
echo "<div class='info-box'><span class='label'>Year of Passing: </span><span class='value'>$yop</span></div>";

if (!empty($skills)) {
    foreach ($skills as $skill) {
        echo "<div class='info-box'><span class='label'>Skill: </span><span class='value'>$skill</span></div>";
    }
} else {
    echo "<div class='info-box'><span class='label'>Skill: </span><span class='value'>None</span></div>";
}

echo "<div class='info-box'><span class='label'>Address: </span><span class='value'>$address</span></div>";

?>
</div>

</body>
</html>
