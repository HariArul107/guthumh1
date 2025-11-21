<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table.css">
</head>

<body>
    <form method="POST" action="table.php">
        <label> Enter No of Coloum </label>
        <input type="number" name="coloum" min="1" max="10" value="<?Php echo $col ?>" required>
        <label> Enter No Of Row </label>
        <input type="number" name="row" min="1" max="10" required>
        <button type="submit" name="fulltable" value="btn1">FULL TABLE</button>
        <button type="submit" name="table" value="btn2">TABLE </button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $col = $_POST["coloum"];
        $row = $_POST["row"];

        if (!empty($_POST["fulltable"])) {
            echo "<table border='1' cellpadding='5' >";
            echo "<tr>";
            echo "<td> * </td>";
            for ($j = 1; $j <= $col; $j++) {
                echo "<td>" . $j . "</td>";
            }
            echo "</tr>";
            for ($i = 1; $i <= $row; $i++) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                for ($j = 1; $j <= $col; $j++) {
                    echo "<td>" . $i . "X" . $j . "=" . ($i * $j) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        if (!empty($_POST["table"])) {
            echo "<table border='1' cellpadding='5' >";
            echo "<tr>";
            echo "<td> * </td>";
            for ($j = 1; $j <= $col; $j++) {
                echo "<td>" . $j . "</td>";
            }
            echo "</tr>";
            for ($i = 1; $i <= $row; $i++) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                for ($j = 1; $j <= $col; $j++) {
                    echo "<td>" . ($i * $j) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>

</body>

</html>