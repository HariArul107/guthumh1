<!DOCTYPE html>
<html>
<head>
  <title>Fetch Data</title>
</head>
<body>
  <h2>Student List</h2>

  <?php
  include('db_connect.php');

  $sql = "SELECT * FROM students";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "<table border='1' cellpadding='10'>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
              </tr>";

      // ✅ Make sure there is NO missing semicolon or bracket before this while
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>".$row['id']."</td>
                  <td>".$row['name']."</td>
                  <td>".$row['email']."</td>
                  <td>".$row['age']."</td>
                </tr>";
      }

      echo "</table>";
  } else {
      echo "No records found.";
  }

  $conn->close();
  ?>
</body>
</html>
