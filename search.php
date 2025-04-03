<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>vDiscuss - Coding Forums</title>
    <style>
        .search{
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <div class="container">
        <!-- search result starts here -->
        <div class="search container mt-4">
            <h1 class="mb-2">Search Results for:
                <em>"<?php echo $_GET['search'] ?>"</em>
            </h1>
            <?php
            $noResults =  true;
                $query = $_GET['search'];
                $sql = "select * from threads where match (thread_title, thread_desc) against ('$query')";
                $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $title = $row['thread_title'];
                        $desc = $row['thread_desc'];
                        $thread_id = $row['thread_id'];
                        $url = "thread.php?threadid=".$thread_id;
                        $noResults = false;
                        //  displaying the search result:
           echo' <div class="d-flex align-items-center result my-1">
                <h3>
                    <a href="'.$url.'" class="text-dark">
                    '.$title.'</a>
                    <p>'.$title.'</p>
                </h3>
            </div> <hr class="my-0">';
        }
        if($noResults){
            echo '<div class="jumbotron jumbotron-fluid mt-3 bg-light border-rounded">
            <div class="container py-3">
                <p class="display-4">No Results Found</p>
                <p class="lead fs-1"> Suggestions: <ul>
                        <li class="lead fs-4" >Make sure that all words are spelled correctly.</li>
                        <li class="lead fs-4">Try different keywords.</li>
                        <li class="lead fs-4">Try more general keywords. </li></ul>
                </p>
            </div>
         </div>';

        }
        ?>
            
        </div>

    </div>
    <?php include 'partials/_footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>