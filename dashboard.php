<?php
session_start();

// التحقق من تسجيل الدخول
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

// الاتصال بقاعدة البيانات
$conn = new mysqli('localhost', 'root', '', 'jobs');

// فحص الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// إذا تم إرسال طلب قبول
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accept_id'])) {
    $accept_id = $_POST['accept_id'];

    // جلب البيانات من جدول emps
    $sql = "SELECT * FROM emps WHERE id='$accept_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // التحقق مما إذا كان الموظف موجود بالفعل في جدول accepted_emps
        $check_sql = "SELECT * FROM accepted_emps WHERE id='$accept_id'";
        $check_result = $conn->query($check_sql);
        if ($check_result->num_rows == 0) {
            // إضافة البيانات إلى جدول accepted_emps
            $insert_sql = "INSERT INTO accepted_emps (id, name, qualification, availability_hours, phone) VALUES ('".$row['id']."', '".$row['name']."', '".$row['qualification']."', '".$row['availability_hours']."', '".$row['phone']."')";
            $conn->query($insert_sql);
        }
    }
}

// إذا تم إرسال طلب حذف
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // حذف البيانات من جدول emps
    $delete_sql = "DELETE FROM emps WHERE id='$delete_id'";
    $conn->query($delete_sql);

    // حذف البيانات من جدول accepted_emps
    $delete_sql = "DELETE FROM accepted_emps WHERE id='$delete_id'";
    $conn->query($delete_sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500&display=swap" rel="stylesheet">
    
    <title>Jobs Dashboard</title>
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            border-bottom: #0779e4 3px solid;
        }
        header h1 {
            margin: 0;
        }
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .delete-btn, .accept-btn {
            background: #e60000;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        .delete-btn:hover {
            background: #cc0000;
        }
        .accept-btn {
            background: #00e600;
        }
        .accept-btn:hover {
            background: #00cc00;
        }
        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                display: none;
            }
            tr {
                margin-bottom: 15px;
            }
            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            td:before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Jobs Dashboard</h1>
            <a href="logout.php">Logout</a>
        </div>
    </header>
    <div class="container">
        <h2>Accepted Jobs</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qualification</th>
                    <th>Availability Hours</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // جلب البيانات من جدول accepted_emps
                    $sql = "SELECT id, name, qualification, availability_hours, phone FROM accepted_emps";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // عرض البيانات في الجدول
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td data-label='ID'>" . $row["id"]. "</td>";
                            echo "<td data-label='Name'>" . $row["name"]. "</td>";
                            echo "<td data-label='Qualification'>" . $row["qualification"]. "</td>";
                            echo "<td data-label='Availability Hours'>" . $row["availability_hours"]. "</td>";
                            echo "<td data-label='Phone'>" . $row["phone"]. "</td>";
                            echo '<td data-label="Action">
                                    <form method="POST" action="">
                                        <input type="hidden" name="delete_id" value="'.$row["id"].'">
                                        <input type="submit" class="delete-btn" value="Delete">
                                    </form>
                                  </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }
                ?>
            </tbody>
        </table>

        <h2>Available Jobs</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qualification</th>
                    <th>Availability Hours</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // جلب البيانات من جدول emps
                    $sql = "SELECT id, name, qualification, availability_hours, phone FROM emps";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // عرض البيانات في الجدول
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td data-label='ID'>" . $row["id"]. "</td>";
                            echo "<td data-label='Name'>" . $row["name"]. "</td>";
                            echo "<td data-label='Qualification'>" . $row["qualification"]. "</td>";
                            echo "<td data-label='Availability Hours'>" . $row["availability_hours"]. "</td>";
                            echo "<td data-label='Phone'>" . $row["phone"]. "</td>";
                            echo '<td data-label="Action">
                                    <form method="POST" action="">
                                        <input type="hidden" name="accept_id" value="'.$row["id"].'">
                                        <input type="submit" class="accept-btn" value="Accept">
                                    </form>
                                    <form method="POST" action="">
                                        <input type="hidden" name="delete_id" value="'.$row["id"].'">
                                        <input type="submit" class="delete-btn" value="Delete">
                                    </form>
                                  </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }

                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>