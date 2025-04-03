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
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <?php
    // rendering data forums from database using categries id:
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
    $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            // fetching username from database to show in thread jumbotron that posted by : 'username':
            $thread_by = $row['thread_user_id'];
            // Query the users table to findout the name of original poster(the thread poster):
            $sql2 = "SELECT user_email FROM `users` WHERE sno = '$thread_by'";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $commented_by = $row2['user_email'];
    }
    ?>
    <!-- thread forum jumbotron and description starts here -->
    <div class="container mt-3">
        <div class="container-fluid py-5 bg-light rounded">
            <h1 class="display-5 fw-bold"><?php echo $title; ?> forums</h1>
            <p class="col-md-8 fs-4"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This is peer to peer forum. No Spam / Advertising / Self-promote in
                the forums. ...
                Do not post copyright-infringing material. ...
                Do not post “offensive” posts, links or images. ...
                Remain respectful of other members at all times.</p>
            <p>Posted by : <em><?php echo $commented_by; ?></em></p>
        </div>
    </div>
    <!-- We have to add a form to input the comments from users here -->
    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '<div class="container mt-3">
            <h1 class="py-2">Post a Comment</h1>
            <form action= "'.$_SERVER['REQUEST_URI'].'" method="post">
                <div class="form-group">
                    <label for="comment" class="mb-2">Write your comment here :</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
                </div>
                <button type="submit" class="btn btn-success mt-2">Post Comment</button>
            </form>
        </div>';
        }
        else{
            echo '<div class="container">
                <h1 class="py-0 mt-3">Write a Comment</h1>
               <p class="fs-3 font-light my-0"> Please log in to write a comment.</p>
            </div>';
        }
    ?>
    <!-- above form will appear as descripted in above comment -->

    <!-- threads list comments container starts from here ,here we will render the comments-->
    <div class="container mt-4">
        <h1 class="py-4">Discussions</h1>
        <!-- will echo threads comments from database and display in this cards -->
          <!-- to insert comment from user query starts here -->
    <?php
    $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        // insert into comment db
        $comment = $_POST['comment'];
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);
        $comment = str_replace("'","\'", $comment);

        $sno = $_POST['sno'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $insertResult = mysqli_query($conn,$sql);
        if($insertResult){
            echo '<div class="container mt-2">
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        <strong>Success!</strong> Your comment has been post successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            </div>';
        }
        else{
            echo " comment cant be submited ".mysqli_error($conn);
        }  
      }
    ?>
        <?php
    // rendering threads from database using categories id:
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
    $result = mysqli_query($conn,$sql);
    $noThread = true;
        while($row = mysqli_fetch_assoc($result)){
            $noThread = false;
            $commentcontent = $row['comment_content'];
            $comment_by = $row['comment_by'];
            $commenttime = date($row['comment_time']);
            $id = $row['comment_id'];
            // adding commented by user email starts from here to
            $comment_byuser = $row['comment_by'];
            $sql2 = "SELECT user_email FROM `users` WHERE sno = '$comment_byuser'";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $commentposter_email = $row2['user_email']; //ends here adding useremail to the comments

           echo '<div class="d-flex my-2">
                <div class="flex-shrink-0">
                    <img src="/myforum/img/profile_img.jpg" width="64px" alt="...">
                </div>
                <!-- real threadslisting starts here -->
                <div class="flex-grow-1 ms-3 align-items-center justify-content-center">
                <p class="fs-6 font-light mb-0 mt-1 fw-bold font-monospace">Commented by: '.$commentposter_email.' | posted on '. $commenttime.'</p>
                    <p class="fs-5 mt-1">'.$commentcontent.'</p>
                </div>
            </div>';
        }
        if($noThread){
            // this will only be seen if their is no comments in the thread comments section
            echo '<div class="card mb-3">
                <div class="card-body py-4 bg-light">
                    <p class="card-title fs-1 fw-normal">No answers Found</p>
                    <p class="card-text fw-light fs-4">Be the first person to  answer this question.</p>
                </div>
            </div>';
        }
    ?>
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