<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>مراجعة طلبات تسجيل الشركات</title>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Tajawal', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 20px;
    }

    .form-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h3 {
      text-align: center;
      margin-bottom: 20px;
    }

    .card {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 20px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
    }

    .card h4 {
      margin: 0 0 10px;
    }

    .card p {
      margin: 5px 0;
    }

    .card-actions {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
    }

    .card-actions form {
      display: inline-block;
    }

    .card-actions input[type="submit"] {
      background: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    .card-actions input[type="submit"]:nth-child(2) {
      background: #dc3545;
    }

    @media (min-width: 600px) {
      .card {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }

      .card-content {
        flex: 1;
        margin-right: 20px;
      }
    }
  </style>
</head>

<body dir="rtl">
  <div class="form-container">
    <h3>مراجعة طلبات تسجيل الشركات</h3>
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

    // جلب البيانات من جدول owner
    $sql = "SELECT * FROM owner";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<div class="card-content">';
            echo '<h4>' . $row['company_name'] . '</h4>';
            echo '<p><strong>العنوان:</strong> ' . $row['address'] . '</p>';
            echo '<p><strong>تفاصيل عن العمل:</strong> ' . $row['details'] . '</p>';
            echo '<p><strong>رقم الهاتف:</strong> ' . $row['phone'] . '</p>';
            echo '</div>';
            echo '<div class="card-actions">';
            echo '<form method="POST" action="process_requests.php">';
            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
            echo '<input type="hidden" name="action" value="accept">';
            echo '<input type="submit" value="قبول">';
            echo '</form>';
            echo '<form method="POST" action="process_requests.php">';
            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
            echo '<input type="hidden" name="action" value="delete">';
            echo '<input type="submit" value="حذف">';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "لا توجد طلبات تسجيل حالياً.";
    }

    // إغلاق الاتصال
    $conn->close();
    ?>
  </div>
</body>

</html>