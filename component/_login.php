<?php
$loginStatus = false;
if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include "_dbconnect.php";
        $email = $_POST['loginemail'];
        $pass = $_POST['loginpass'];
        $existsql = "SELECT * FROM `userdata` WHERE user_email = '$email'";
        $result = mysqli_query($conn, $existsql);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pass, $row['user_pass'])) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['sno'] = $row['sno'];
                $_SESSION['name'] = $row['user_name'];
                // $_SESSION['loggedin'] = true;

                // echo " <br>You are Logegd in";
                // echo $row['user_name'];
                // $loginStatus = true;
                header("Location: /forum/index.php");
            }
            else{
                // echo 'password not matched';
                $loginStatus = true;
            }

        }

    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login to continue</title>
</head>

<body>
    <?php include "_navbar.php"; ?>
    <?php
        if (isset($_GET['signup']) && $_GET['signup'] == "true") {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert my-0">
            <strong>Success! </strong>Your sign up is Successful. login to Continue.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

        if ($loginStatus) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert my-0">
            <strong>Error! </strong>Password not matched.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

    ?>
    <div class="container">
        <h1 class="text-center my-2">Login to Continue</h1>
        <form action="/forum/component/_login.php" method="POST">
            <div class="mb-3">
                <label for="loginemail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="loginemail" name="loginemail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="loginpass" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginpass" name="loginpass">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>