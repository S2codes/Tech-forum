<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>BeetaBie - The Future Tech Gaint</title>
</head>

<body>
    <?php
    include "component/_dbconnect.php";
    include "component/_navbar.php";
    include "component/_slider.php";
    ?>
    <h1 class="text-center m-2">BeetaBie - Feel free to ask Your Query</h1>
    <h2 class="text-center mx-4" style="text-decoration: underline;">All Categories are Here</h2>


    <div class="container my-3 ">
        <div class="row mx-auto">

            <!-- Categories start here  -->

            <!-- fetch all the categories  -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                // echo $row['category_id'];
                // echo ".";
                // echo $row['category_name'];
                // echo "<br>";
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_description'];
                echo '
                    <div class="col-md-4 my-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/400x400/?' . $cat . ',internet, computer " class="card-img-top"
                            alt="JS">
                        <div class="card-body">
                            <h5 class="card-title"><a href = "theards.php?catid=' . $id . '"> ' . $cat . '</a></h5>
                            <p class="card-text">' . substr($desc, 0, 100)  . '...</p>
                            <a href = "theards.php?catid=' . $id . '" class="btn btn-primary">Browse More</a>
                        </div>
                    </div>
                </div>
                    ';
            }

            ?>


        </div>


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