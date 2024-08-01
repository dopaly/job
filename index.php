<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body dir="rtl">
  <!--<header>
    <div class="container">
      <a href="index.html">
        <h2>القرين نيوز</h2>
      </a>
    </div>
  </header>-->
    <!-- زر فتح القائمة الجانبية -->
    <div>
      <button class="openbtn" onclick="openNav()" id="open"><i class="fas fa-bars"></i></button>
    </div>
  
    <!-- القائمة الجانبية -->
    <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#"><i class="fab fa-facebook-f"></i>صفحتنا علي فيسبوك</a>
      <a href="#"><i class="fab fa-whatsapp"></i>واتس آب الادارة</a>
      <a href="#">معلومات عنا</a>
      <a href="#">الشكاوى</a>
    </div>
  
  <div class="main">
    <div class="container">
      <img src="./images/3d-business-man-and-woman-working-at-the-table.png" alt="">
      <h1>القرين جوب</h1>
      <p>يوفر موقع القرين جوب فرص عمل للشباب من كلا الجنسين للعمل داخل المدينه وذلك عن عرض معلوماتك ومؤهلاتك وكذلك لأصحاب العمل حيث يتيح موقعنا تفاصيل عن مجال عملك ليتقدم الموظف المناسب</p>
      <a href="#news">الأقسام</a>
    </div>
  </div>
  <section class="sections" id="news">
    <div class="container">
      <a href="owner.php">
        <img  src="./images/3d-casual-life-man-chatting-remotely-with-female-colleague.png" alt="">
        <p>أضف نشاط عملك لتلقي موظف</p>
      </a>
      <a href="emps_data.php">
        <img class="one" src="./images/3d-business-male-builder-with-sledgehammer.png" alt="">
        <p>أضف معلوماتك للبحث عن عمل</p>
      </a>
    </div>
  </section>
  <!--<div class="headTitle">
    <h3>اعلانات مدفوعه</h3>
  </div>
  <div class="adv">
    
  </div>-->
  
  
  <marquee width="100%" direction="right" loop="infinite">
    أبحث عن وظيفه او موظف لنشاطك او اضف اعلانات لنشاطك
  </marquee>
  <script src="main.js"></script>
</body>
</html> 