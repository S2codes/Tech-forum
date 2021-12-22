<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/8f7c5a9c29.js" crossorigin="anonymous"></script>
    <title>All question - ask your question to the community</title>
</head>

<body>
    <?php
    include "component/_dbconnect.php";
    include "component/_navbar.php";
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id = $id";
    $result = mysqli_query($conn, $sql);
    // $theard_user_id = $_SESSION['sno'];
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true ) {
        $theard_user_id = $_SESSION['sno'];
    }else{
        $theard_user_id = 0;
    }
    
    while ($row = mysqli_fetch_assoc($result)) {
        $catgname = $row['category_name'];
        $catgdesc = $row['category_description'];
    }
    ?>

    <?php
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $showAlert = false;
        // insert theard into db 
        $th_title = $_POST['title'];
        $th_title = str_replace("<", "&lt", $th_title);
        $th_title = str_replace(">", "&gt", $th_title);
        $th_desc = $_POST['desc'];
        $th_desc = str_replace(">", "&gt", $th_desc);
        $th_desc = str_replace("<", "&lt", $th_desc);
        $sql = "INSERT INTO `theards` ( `theard_title`, `theard_decs`, `theard_catg_id`, `theard_user_id`) VALUES ( '$th_title', '$th_desc', '$id', '$theard_user_id');";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your Query has been added! Please wait for community to respond
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
        }
    }
    ?>
    <div class="container my-4">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h2><?php echo  $catgname ?></h2>
            <p><?php echo $catgdesc ?></p>
        </div>
    </div>

    <div class="container">
        <h1>Ask Your Query!!!</h1>

        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true ) {
           echo '
           <form action=" '. $_SERVER["REQUEST_URI"].'" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Enter Your Query</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
            <div id="title" class="form-text">Make your Question as short as Possible</div>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Describe Your Query</label>
            <!-- <input type="password" class="form-control" id="exampleInputPassword1"> -->
            <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        ';
        }
        else{
            echo "<p> Please login to Start Your Ask your Query </p>";
        }
        ?>


        <h2>Browse Questions</h2>
        <!-- Browse all question  -->
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `theards` WHERE theard_catg_id = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['theard_id'];
            $title = $row['theard_title'];
            $desc = $row['theard_decs'];
            $theard_user_id = $row['theard_user_id'];

            $sql2 = "SELECT user_name FROM `userdata` WHERE sno = $theard_user_id";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);



            echo '
            <div class="d-flex my-3">
            <div class="flex-shrink-0">
                <i class="fas fa-user-tie fs-2 my-2"></i>
            </div>
            <div class="flex-grow-1 ms-3">
            <p class = "my-0"> Asked by : '. $row2['user_name'] .' at 5.11am'.'</p>
                <h5><a href="theardmain.php?thid=' . $id . '" class ="text-decoration-none "> ' . $title . '</a></h5>
                <p class = "text-muted">' . $desc . '</p>
            </div>
            </div>
            ';
        }
        if ($noResult) {
            echo "
        <h5>No Question Found</h5>
        <br />
        Be the First Person to ask Question";
        }


        ?>



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