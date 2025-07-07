<?php
  require 'function.php';
  if (isset($_POST['submit'])) 
  {
    $message = register($_POST);

    echo "
    <script>
    alert ('". addslashes($message). "');
    </script>
    ";

  }
?>


<!DOCTYPE html>

ml>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Web Informatika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-center">Register</h3>
                        <form>
                            <div class="card-body"></div>
                            <form action="" method="post" enctype="multipart/form-data"></form>
                        
                            <div class="mb-3">
                                <label for="Username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="Username" 
                                name="username" placeholder="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password"
                                name="password1" placeholder="password" required>
                            </div>
                            <div class="mb-3 form-check">
                                 <label for="password" class="form-label">Konfirmasi password</label>
                                <input type="password" class="form-control" id="password2"
                                name="password2" placeholder="konfirmasi password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</form>
                        </body>

</html>
