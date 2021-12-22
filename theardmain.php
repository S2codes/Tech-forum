<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8f7c5a9c29.js" crossorigin="anonymous"></script>
    <title>All Answer - Submit Your Answer and support the community </title>
</head>


<body>

    <?php
        include "component/_dbconnect.php";
        include "component/_navbar.php";
        $tid = $_GET['thid'];
        $sql = "SELECT * FROM `theards` WHERE theard_id = $tid";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['theard_title'];
            $decs = $row['theard_decs'];
            $theard_user_id = $row['theard_user_id'];

            $sql2 = "SELECT user_name FROM `userdata` WHERE sno = $theard_user_id";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
        }
        ?>
    <div class="container my-4">

        <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h2><?php echo  $title ?></h2>
            <p><?php echo $decs ?></p>
            <!-- <p>PHP is a general-purpose scripting language geared towards web development. It was originally created by
                Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by
                The PHP Group</p> -->
            <p> Posted By :  <?php echo $row2['user_name']; ?></p> 
            <!-- <button class="btn btn-outline-light" type="button">Posted by : abcd</button> -->
        </div>

    </div>
    <?php 
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $comment = $_POST['comment'];
        $comment = str_replace("<", "&lt", $comment);
        $comment = str_replace(">", "&gt", $comment);
        $commented_user_id = $_SESSION['sno'];
        $sql = "INSERT INTO `comments` ( `comment_content`, `theard_id`, `comment_by`) VALUES ( '$comment', '$tid', '$commented_user_id')";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your Answer has been added!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
    }
    }
    ?>

    <div class="container">
        <h1>Post Your Comment</h1>

        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true ){
            echo '
            <form action="'. $_SERVER['REQUEST_URI'] .'" method="post">

            <div class="mb-3">
                <label for="desc" class="form-label">Enter Your Comment</label>
                <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
                ';
        }
        else{
            echo '<p>Please login first to give your Answer</p>';
            
        }
    ?>


    </div>


    <div class="container">
        <h1>All Related Questions are here</h1>

        <?php
        $id = $_GET['thid'];
        $sql = "SELECT * FROM `comments` WHERE theard_id = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['comment_id'];
        $comment = $row['comment_content'];
        $comment_by = $row['comment_by'];
        $tstamp = $row['stamp'];
        $noResult = false;

        $sql2 = "SELECT user_name FROM `userdata` WHERE sno = $comment_by";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
       

        echo'
        <div class="d-flex my-3">
            <div class="flex-shrink-0">
                <i class="fas fa-user-tie fs-2"></i>
            </div>
            <div class="flex-grow-1 ms-3">
            <p class = "my-0 "> <b>'. $row2['user_name'] .'</b> at '.$tstamp.'</p>
                <p>'. $comment  .'</p>
            </div>
        </div>
        ';
        }

        if ($noResult) {
            echo '
            <div class="h-100 p-5 bg-light border rounded-3 my-4">
          <h2>No Comments are found</h2>
          <p>Be the First Person to Give the Answer </p>
          
            ';
        }
?>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
</body>

</html>