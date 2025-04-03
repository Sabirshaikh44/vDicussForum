<?php
session_start();
echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/myforum">vDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-0 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/myforum">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/myforum/about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                       Top 3 Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                //    we will display top categories here from our database in these dropdown menu:
                $sql = "SELECT category_name,category_id FROM `categories` Limit 3";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo'
                        <li><a class="dropdown-item" href="threadslist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>
                        ';
                }
                  echo'</ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/myforum/contact.php">Contact</a>
                </li>
            </ul>
            ';
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                echo '<p class="text-light my-0 mx-1"> Welcome '.$_SESSION['useremail'].'</p>';
                echo'
                <form class="d-flex" action="search.php" method="get">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button> 
                    <a href="/myforum/partials/_logouthandle.php" class="btn btn-outline-success my-0 mx-1">Logout</a>
                </form>';
            }
            else{  
            echo '<form class="d-flex" action="search.php" method="get" >
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
            <div class="inline me-md-1">
                <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button class="btn btn-outline-success my-1" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
            </div>';
        }

        echo '</div>
    </div>
</nav>';
include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Account created!</strong> You can now login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] !== "true")
{
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Account Exists!</strong> Try SigningUp using different credentials .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>