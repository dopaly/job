<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM accepted_emps";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accepted Employees</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="emps_data.css">
</head>
<body dir="rtl">
    <header>
      <div class="container">
        <h2>قسم الموظفين المتاحين</h2>
        <a href="index.php">
          <i class="fa-solid fa-angle-left"></i>
        </a>
      </div>
    </header>
    <div class="addJob">
      <a href="worker.php">أضف معلومات عنك</a>
    </div>
        <div class="headImg">
          <img src="./images/3d-business-a-group-of-cheerful-young-people.png" alt="">
        </div>
    
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h2>" . $row["name"] . "</h2>";
        
       echo"<label for=''>المؤهل الدراسي</label>";
       
        echo "<p> " . $row["qualification"] . "</p>";
        echo"<label for=''>عدد ساعات العمل المتاحه</label> ";
        
        echo "<p>" . $row["availability_hours"] . "</p>";
        echo"<label for=''>رقم الموبايل للتواصل</label> ";

        echo "<p>" . $row["phone"] . "</p>";
        echo "</div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>