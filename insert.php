<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>
<body>
    <h2>Insert student data</h2>
    <form method="POST" action="">
        Name:<input type="text" name="name" required>
       Email: <input type="email" name="email" required>
       Age: <input type="number" name="age" required>
       <input type="submit" name="submit" value="Save Data">
    </form>
    <?php include ('db_connect.php'); 
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $age=$_POST['age'];
       $sql="INSERT INTO students (name,  email, age) VALUES ('$name','$email','$age')";
       if($conn->query($sql) === TRUE){
         header("Location: fetch.php");
          exit(); // always use exit after header redirect
       }else{
        echo "failed";
       }
    }
    $conn->close();
    ?>
</body>
</html>