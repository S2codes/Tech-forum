<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>BeetaBie - Search your relatable querry</title>
</head>

<body>
    <?php
    include "component/_dbconnect.php";
    include "component/_navbar.php";


    
    ?>

    <div class="container my-3" id="maincontainer">
        <h1 class="py-3">Search results for <em>"<?php echo $_GET['search_query']?>"</em></h1>


        <div class="flex-grow-1 ms-3">
            <?php
            $noresult = true;
            $search_query = $_GET['search_query'];
            $sql = "SELECT * FROM theards WHERE MATCH(theard_title, theard_decs) AGAINST ('$search_query')";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['theard_title'];
                    $decs = $row['theard_decs'];
                    $theard_id = $row['theard_id'];
                    $url = "theardmain.php?thid=".$theard_id;
                    // echo var_dump($row);
                    $noresult = false;

                    echo '<h5><a href="'.$url.'" class="text-decoration-none ">'. $title.'</a></h5>
                    <p class="text-muted">'.$decs.'</p>';
                }
            }
            else{
                $noresult = true;
                if ($noresult) {
                    echo '<div class="jumbotron jumbotron-fluid bg-light">
                    <div class="container">
                        <p class="display-4">No Results Found</p>
                        <p class="lead"> Suggestions: <ul>
                                <li>Make sure that all words are spelled correctly.</li>
                                <li>Try different keywords.</li>
                                <li>Try more general keywords. </li></ul>
                        </p>
                    </div>
                 </div>';
                }
            }
               
            ?>

        </div>


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