<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // الاتصال بقاعدة البيانات
    $conn = new mysqli('localhost', 'root', '', 'jobs');

    // فحص الاتصال
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // حذف السجل من الجدول
    $sql = "DELETE FROM accepted WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    // إعادة التوجيه إلى الصفحة الرئيسية بعد الحذف
    header("Location: dashboard.php");
    exit();
} else {
    echo "Invalid request method.";
}
?>