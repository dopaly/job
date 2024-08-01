<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>نموذج تسجيل الشركة</title>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="addOwner.css">
</head>

<body dir="rtl">
  <header>
    <div class="container">
      <h2>نموذج تسجيل اسم الشركه</h2>
      <a href="owner.php">
        <i class="fa-solid fa-angle-left"></i>
      </a>
    </div>
  </header>

  <div class="form-container">
    <h3>تسجيل الشركة او المحل</h3>
    <form method="POST" action="process_form.php">
      <label for="company-name">اسم الشركة أو المحل:</label>
      <input type="text" id="company-name" name="company-name" required aria-label="اسم الشركة أو المحل">

      <label for="address">العنوان:</label>
      <input type="text" id="address" name="address" required aria-label="العنوان">

      <label for="details">تفاصيل عن العمل:</label>
      <textarea id="details" name="details" rows="4" required aria-label="تفاصيل عن العمل"></textarea>

      <label for="phone">رقم الهاتف للتواصل:</label>
      <input type="tel" id="phone" name="phone" required aria-label="رقم الهاتف للتواصل">

      <input type="submit" value="تسجيل">

    </form>
  </div>
</body>

</html>