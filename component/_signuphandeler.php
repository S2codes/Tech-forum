<!-- <?php
$successAlert = false;
$passAlert = false;
$emailCheck = false;

if (isset($_POST['submit'])) {
    echo "Submit Button Clicked <br>";
    if ($_SERVER['REQUEST_METHOD']=='POST') {
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
        }
        else{
            if ($password == $cpassword) {
                echo "password matched";
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `userdata` (`user_name`, `user_email`, `user_pass`) VALUES ( '$name', '$email', '$hash')";
                $result = mysqli_query($conn, $sql);
                $successAlert = true;
                header("Location: /forum/component/_login.php?signup=$successAlert");

                if (!$result) {
                    echo "<br> didn't Submited try again". mysqli_error($conn);
                }
            }
            else{
                // echo "<br> password are not matched";
                $passAlert = true;
            }
        }
    }
}



?> -->