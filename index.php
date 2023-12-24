<?php
//database connection details
$db_host = "fdb1033.awardspace.net";
$db_user = "4419726_hfiles";
$db_pass = "Hakim@100";
$db_name = "4419726_hfiles";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Fetch the uploaded files from the database
$sql = "SELECT * FROM files";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>الملفات المرفوعة</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            padding-top: 60px; /* Adjust padding-top for fixed navbar */
        }

        .container {
            max-width: 95%;
            margin: auto;
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            max-width: 95%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        a.btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        a.btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .no-files {
            font-style: italic;
            color: #6c757d;
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
</nav>
        <h2>الملفات المرفوعة</h2>
        <a class="btn btn-danger" href="login.php">رفع ملفات أخرى</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>اسم الملف</th>
                    <th>حجم الملف</th>
                    <th>نوع الملف</th>
                    <th>تحميل</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the uploaded files and download links
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $file_path = "uploads/" . $row['filename'];
                        ?>
                        <tr>
                            <td><?php echo $row['filename']; ?></td>
                            <td><?php echo $row['filesize']; ?> بايت</td>
                            <td><?php echo $row['filetype']; ?></td>
                            <td><a href="<?php echo $file_path; ?>" class="btn btn-primary" download>تحميل</a></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4" class="no-files">لا توجد ملفات مرفوعة حتى الآن.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer class="footer mt-auto py-3 text-center">
  <div class="container">
    <span class="text-muted">حقوق النشر ©  محفوظة ل <a class="btn btn-success" href="https://hbouzourdaz.netlify.app/">  الأستاذ حكيم بوزورداز</a></span>
  </div>
</footer>


</body>
</html>

<?php
$conn->close();
?>
