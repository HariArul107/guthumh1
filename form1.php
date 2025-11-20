<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <!-- <form method="post" action="index.php"> -->
    <div class="form-container">
        <form method="post" action="">
            <h2>Registration Form</h2>

            <label for="Fname">First Name:</label>
            <input type="text" id="Fname" name="Fname" required>
            <span class="error" id="fnameErr"></span>

            <label for="Lname">Last Name:</label>
            <input type="text" id="Lname" name="Lname" required>
            <span class="error" id="lnameErr"></span>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span class="error" id="emailErr"></span>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
            <span class="error" id="phoneErr"></span>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
            <span class="error" id="dobErr"></span>
            <label>Gender:</label>
            <div class="gender-box">
                <input type="radio" id="male" name="gender" value="male" required>
                Male
                <input type="radio" id="female" name="gender" value="female" required>
                Female
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
            <span class="error" id="yopErr"></span>
            <label for="skills">Skills:</label>
            <div class="skills-box">
                <input type="checkbox" id="html" name="skills[]" value="HTML" required>
                HTML
                <input type="checkbox" id="css" name="skills[]" value="CSS">
                CSS
                <input type="checkbox" id="js" name="skills[]" value="JavaScript">
                JavaScript
            </div>
            <span class="error" id="skillsErr"></span>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <input type="submit" value="Submit">
        </form>
        <div id="result"></div>
    </div>

    <script>
        $(document).ready(function() {
            $("form").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "process.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        try {
                            let data = JSON.parse(response);
                            if (data.success === false) {
                                $("#fnameErr").text(data.fnameErr);
                                $("#lnameErr").text(data.lnameErr);
                                $("#emailErr").text(data.emailErr);
                                $("#phoneErr").text(data.phoneErr);
                                $("#dobErr").text(data.dobErr);
                                $("#genderErr").text(data.genderErr);
                                $("#yopErr").text(data.yopErr);
                                $("#skillsErr").text(data.skillsErr);
                                $("#addressErr").text(data.addressErr);
                                $("#result").html('');
                                return;
                            }
                        } catch (e) {
                            $("#result").html(response);
                            $("form")[0].reset();
                        }
                    }
                });
            });
        });
    </script>


</body>

</html>