<?php
$servername = "localhost";
$username = "root"; // استخدم اسم المستخدم الصحيح لقاعدة البيانات الخاصة بك
$password = ""; // استخدم كلمة المرور الصحيحة لقاعدة البيانات الخاصة بك
$dbname = "jobs";

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// الحصول على البيانات المرسلة من النموذج
$company_name = $_POST['company-name'];
$address = $_POST['address'];
$details = $_POST['details'];
$phone = $_POST['phone'];

// تحضير بيان SQL لإدخال البيانات
$sql = "INSERT INTO owner (company_name, address, details, phone) VALUES (?, ?, ?, ?)";

// تحضير البيان باستخدام MySQLi
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $company_name, $address, $details, $phone);

// تنفيذ البيان والتحقق من النجاح

if ($stmt->execute()) {
    echo '<div style="  text-align: center;display: flex; align-items: center; justify-content: center; height: 100vh;  flex-wrap: wrap;">
            <h1 style="  text-align: center;font-size: 4em; color: red; font-weight: bold;">تم تسجيل البيانات وسوف تتم مراجعتها.            <br>
              <a href="index.php" style="font-weight: bold; font-size: 50px">العوده الي الموقع</a>
            </h1>


           

          </div>';
} else {
    echo '<div style="display: flex; align-items: center; justify-content: center; height: 100vh;">
            <h1 style="font-size: 3em; color: red;">خطأ: ' . $sql . '<br>' . $conn->error . '</h1>
          </div>';
}
// إغلاق البيان والاتصال
$stmt->close();
$conn->close();
?>