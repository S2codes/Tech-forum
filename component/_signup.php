<?php
// include "_signuphandeler.php";  

$successAlert = "false";
$passAlert = false;
$emailCheck = false;

if (isset($_POST['submit'])) {
    // echo "Submit Button Clicked <br>";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include "_dbconnect.php";
        $name = $_POST['uname'];
        $email = $_POST['signupEmail'];
        $password = $_POST['signPassword'];
        $cpassword = $_POST['signcPassword'];

        $existsql = "SELECT * FROM `userdata` WHERE user_email = '$email'";
        $result = mysqli_query($conn, $existsql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $emailCheck = true;
            // echo "<br>it seemedd You already have an account with this email";
        } else {
            if ($password == $cpassword) {
                echo "password matched";
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `userdata` (`user_name`, `user_email`, `user_pass`) VALUES ( '$name', '$email', '$hash')";
                $result = mysqli_query($conn, $sql);
                $successAlert = "true";
                header("Location: /forum/component/_login.php?signup=$successAlert");
                exit();
                if (!$result) {
                    echo "<br> didn't Submited try again" . mysqli_error($conn);
                }
            } else {
                // echo "<br> password are not matched";
                $passAlert = true;
            }
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create an Account to Ask your question or reply other to solve their problem</title>
</head>

<body>
    <?php include "_navbar.php"; ?>
    <div class="container my-2">
        <h1 class="text-center">Sign Up</h1>
        <form action="/forum/component/_signup.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" class="form-control" id="name" name="uname" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">

                <label for="signupEmail" class="form-label">Email address</label>
                <?php
                if ($emailCheck) {
                    echo ' 
                        <span class = "text-danger fs-11">it seemedd You already have an account with this email</span>
                        ';
                }
                ?>
                <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="signPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="signPassword" id="signPassword">
            </div>
            <div class="mb-3">
                <label for="signcPassword" class="form-label"> Confirm Password</label>
                <?php
                if ($emailCheck) {
                    echo ' 
                        <span class = "text-danger fs-11">password are not matched</span>
                        ';
                }
                ?>
                <input type="password" class="form-control" id="signcPassword" name="signcPassword">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>