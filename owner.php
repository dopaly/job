<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>news page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="owner.css">
</head>
<body dir="rtl">
    <header>
    <div class="container">
      
        <h2>قسم عرض الوظائف الخالية</h2>
        <a href="index.php">
          <i class="fa-solid fa-angle-left"></i>
        </a>
    </div>
  </header>
    <div class="addJob">
      <a href="addOwner.php">أضف معلومات عن نشاطك</a>
    </div>
    <div class="headImg">
      <img src="./images/3d-casual-life-group-of-young-people-discussing-something-while-working.png" alt="">
    </div>
    <section>
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

      // جلب البيانات من جدول accepted
      $sql = "SELECT * FROM accepted";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="jobCard">';
              echo '<label>اسم المنشأة او المحل</label>';
              echo '<p>' . htmlspecialchars($row['company_name']) . '</p>';
              echo '<label>العنوان</label>';
              echo '<p>' . htmlspecialchars($row['address']) . '</p>';
              echo '<label>مطلوب</label>';
              echo '<p>' . htmlspecialchars($row['details']) . '</p>';
              echo '<label>موبايل للتواصل</label>';
              echo '<p>' . htmlspecialchars($row['phone']) . '</p>';
              echo '</div>';
          }
      } else {
          echo "<p>لا توجد وظائف حالياً.</p>";
      }

      // إغلاق الاتصال
      $conn->close();
      ?>
    </section>
</body>
