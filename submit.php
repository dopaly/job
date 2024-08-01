<?php
$servername = "localhost";
$username = "root"; // ضع اسم المستخدم لقاعدة البيانات الخاصة بك
$password = ""; // ضع كلمة المرور لقاعدة البيانات الخاصة بك
$dbname = "jobs";

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال البيانات من النموذج
    $name = $conn->real_escape_string($_POST['name']);
    $qualification = $conn->real_escape_string($_POST['qualification']);
    $availability_hours = $conn->real_escape_string($_POST['availability_hours']);
    $phone = $conn->real_escape_string($_POST['phone']);

    // إنشاء استعلام إدخال
    $sql = "INSERT INTO emps (name, qualification, availability_hours, phone) VALUES ('$name', '$qualification', '$availability_hours', '$phone')";

    // تنفيذ الاستعلام والتحقق من الإدخال
    if ($conn->query($sql) === TRUE) {
        echo'
        <div style="  text-align: center;display: flex; align-items: center; justify-content: center; height: 100vh;  flex-wrap: wrap;">
        <h1 style="  text-align: center;font-size: 4em; color: red; font-weight: bold;">تم تسجيل البيانات وسوف تتم مراجعتها.
        <br>
        <a href="index.php" style="font-weight: bold; font-size: 50px">العوده الي الموقع</a>
        </h1>
       </div>';
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }

    // إغلاق الاتصال
    $conn->close();
}
?>