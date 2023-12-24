<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/"; // Change this to the desired directory for uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (you can modify this to allow specific file types)
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf", "exe", "php","docx","pptx","ppt","xls","xlsx","doc");
        if (!in_array($file_type, $allowed_types)) {
            echo '<div class="alert alert-danger mt-3 center" role="alert">عذرًا، يُسمح فقط بتحميل ملفات JPG، JPEG، PNG، GIF، و PDF.</div>';
        } else {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // File upload success, now store information in the database
                $filename = $_FILES["file"]["name"];
                $filesize = $_FILES["file"]["size"];
                $filetype = $_FILES["file"]["type"];

                // Database connection
                $db_host = "fdb1033.awardspace.net";
                $db_user = "4419726_hfiles";
                $db_pass = "Hakim@100";
                $db_name = "4419726_hfiles";

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert the file information into the database
                $sql = "INSERT INTO files (filename, filesize, filetype) VALUES ('$filename', $filesize, '$filetype')";

                if ($conn->query($sql) === TRUE) {
                    echo '<div class="alert alert-success mt-3 center" role="alert">تم تحميل الملف ' . basename($_FILES["file"]["name"]) . ' وتخزين المعلومات في قاعدة البيانات بنجاح.</div>';
                } else {
                    echo '<div class="alert alert-danger mt-3 center" role="alert">عذرًا، حدث خطأ أثناء تحميل ملفك وتخزين المعلومات في قاعدة البيانات: ' . $conn->error . '</div>';
                }

                $conn->close();
            } else {
                echo '<div class="alert alert-danger mt-3 center" role="alert">عذرًا، حدث خطأ أثناء تحميل ملفك.</div>';
            }
        }
    } else {
        echo '<div class="alert alert-danger mt-3 center" role="alert">لم يتم تحميل أي ملف.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تحميل وتحميل الملفات</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            padding-top: 60px; /* Adjust padding-top for fixed navbar */
        }

        .container {
            max-width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .error-message {
            color: #ff0000; /* Red color for error messages */
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php">الصفحة الرئيسية</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="btn btn-danger" href="upload.php">رفع ملفات أخرى</a>
      </li>
    </ul>
  </div>
</nav>
        <h2>رفع ملف</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">اختر ملف</label>
                <input type="file" class="form-control" name="file" id="file">
            </div>
            <button type="submit" class="btn btn-primary">رفع الملف</button>
        </form>
    </div>
    <footer class="footer mt-auto py-3 text-center">
  <div class="container">
    <span class="text-muted">حقوق النشر ©  محفوظة ل <a class="btn btn-success" href="https://hbouzourdaz.netlify.app/">  الأستاذ حكيم بوزورداز</a></span>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
