<?php
// include "component/_dbconnect.php";
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/forum/index.php">BeetaBie</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/forum/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                        $sql = "SELECT category_name, category_id FROM `categories` ";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <li><a class="dropdown-item" href="/forum/theards.php?catid='.$row["category_id"].'">'.$row["category_name"].'</a></li>
                            
                            ';
                        }

                    ?>
<!-- 
                        <li><a class="dropdown-item" href="#">Programming</a></li>
                        <li><a class="dropdown-item" href="#">IOT</a></li> -->
                       
                    </ul>
                </li>

            </ul>


            <form class="d-flex" action="search.php" method="get">
                <input class="form-control me-2" type="search" name="search_query"  placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>


            <?php
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true ) {
          echo '
          <Span class= "text-light my-0 mx-2">Hello <br> <b>'; echo $_SESSION['name']. ' </b></Span>
          <button class="btn btn-outline-danger " type="submit"><a href="/forum/component/_logout.php" class="text-light text-decoration-none">Logout</a></button>
          ';
      }
      else{
        echo '
        <button class="btn btn-outline-primary mx-2" type="submit"><a href="/forum/component/_signup.php" class="text-light text-decoration-none">Signup</a></button>
      <button class="btn btn-outline-danger " type="submit"><a href="/forum/component/_login.php" class="text-light text-decoration-none">Login</a></button>
        ';
      }

    ?>

        </div>
    </div>
</nav>