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

// التحقق من نوع الطلب (قبول أو حذف)
if (isset($_POST['action'])) {
    $id = $_POST['id'];

    if ($_POST['action'] == 'accept') {
        // جلب البيانات من جدول owner
        $sql = "SELECT * FROM owner WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // إدراج البيانات في جدول accepted
        $sql_insert = "INSERT INTO accepted (company_name, address, details, phone) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ssss", $row['company_name'], $row['address'], $row['details'], $row['phone']);
        $stmt_insert->execute();
        $stmt_insert->close();
    }

    // حذف البيانات من جدول owner
    $sql_delete = "DELETE FROM owner WHERE id = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $id);
    $stmt_delete->execute();
    $stmt_delete->close();
}

// إغلاق الاتصال
$conn->close();

// إعادة التوجيه إلى صفحة المراجعة
header("Location: review_requests.php");
exit();
?>