<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>تسجيل بيانات الموظف</title>
    <link rel="stylesheet" href="worker.css">
</head>
<body dir="rtl">
    <header>
    <div class="cont">
      <h2>نموذج تسجيل اسم الموظف  </h2>
      <a href="index.php">
        <i class="fa-solid fa-angle-left"></i>
      </a>
    </div>
  </header>

    <div class="container">
        <h2>تسجيل بيانات الموظف</h2>
        <form action="submit.php" method="post">
            <div class="form-group">
                <label for="name">الاسم:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="qualification">المؤهل:</label>
                <input type="text" id="qualification" name="qualification" required>
            </div>
            <div class="form-group">
                <label for="availability_hours">ساعات التفرغ:</label>
                <input type="number" id="availability_hours" name="availability_hours" required>
            </div>
            <div class="form-group">
                <label for="phone">رقم الهاتف:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <button type="submit" class="btn">تسجيل</button>
        </form>
    </div>
</body>
</html>