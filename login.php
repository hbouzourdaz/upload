
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول</title>
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
            padding-top: 60px;
        }

        .container {
            max-width: 400px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-login {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-login:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .error-message {
            color: #ff0000;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php">الصفحة الرئيسية</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
        <h2>تسجيل الدخول</h2>
        <form id="loginForm">
            <div class="form-group">
                <label for="username">اسم المستخدم:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="button" class="btn btn-primary btn-login" onclick="validateLogin()">تسجيل الدخول</button>
            <div id="errorMessage" class="error-message"></div>
        </form>
    </div>

    <script>
        function validateLogin() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var errorMessage = document.getElementById('errorMessage');

            // Simple validation, you can replace this with more sophisticated validation logic
            if (username === 'admin' || password === '0000') {
                window.location.href = 'upload.php';
            } else {
                // Your logic for handling the login, e.g., redirect to the upload page
                errorMessage.innerText = 'يرجى إدخال اسم المستخدم وكلمة المرور.';
            }
        }
    </script>
        <footer class="footer mt-auto py-3 text-center">
  <div class="container">
    <span class="text-muted">حقوق النشر ©  محفوظة ل <a class="btn btn-success" href="https://hbouzourdaz.netlify.app/">  الأستاذ حكيم بوزورداز</a></span>
  </div>
</footer>

</body>
</html>
