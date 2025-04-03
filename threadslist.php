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
    // rendering data forums from database using categories id:
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id = $id";
    $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
    }
    ?>
    <!-- thread forum jumbotron and description starts here -->
    <div class="container mt-3">
        <div class="container-fluid py-5 bg-light rounded">
            <h1 class="display-5 fw-bold">Welcome to <?php echo $catname; ?> forums</h1>
            <p class="col-md-8 fs-4"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is peer to peer forum. No Spam / Advertising / Self-promote in
                the forums. ...
                Do not post copyright-infringing material. ...
                Do not post “offensive” posts, links or images. ...
                Remain respectful of other members at all times.</p>
            <button class="btn btn-success btn-lg" type="button">Learn more</button>
        </div>
    </div>
    <!-- We have to add a form to input the thread from users here -->
    <!-- Here we will right query to submit form of thread into databse -->
    <?php
    $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        // insert into thread db
        $threadtitle = $_POST['title'];
        $threaddesc = $_POST['desc'];
        // to sort out attackers to post attacking code for attack etc, and debugging some errors due to symbol like commas scripting tags,etc error:
        $threadtitle = str_replace("<", "&lt;", $threadtitle);
        $threadtitle = str_replace(">", "&gt;", $threadtitle);
        $threadtitle = str_replace("'","\'", $threadtitle);
        $threadtitle = str_replace("\\", "\\", $threadtitle);
        $threadtitle = str_replace("'","\'", $threadtitle);
        $threaddesc = str_replace("<", "&lt;", $threaddesc);
        $threaddesc = str_replace(">", "&gt;", $threaddesc);
        $threaddesc = str_replace("'","\'", $threaddesc);
        $threaddesc = str_replace("\\", "\\", $threaddesc); 


        $sno = $_POST['sno'];
        $sql= "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$threadtitle', '$threaddesc', '$id', '$sno', current_timestamp());";
        $insertResult = mysqli_query($conn,$sql);
        if($insertResult){
            echo '<div class="container mt-2"><div class="alert alert-success alert-dismissible fade show " role="alert">
                <strong>Success!</strong> Your Thread has been submitted,Kindly wait for the community reply.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          </div>';
        }
        else{
            echo " cant be submited ".mysqli_error($conn);
        }  
      }
    ?>
     
    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo'<div class="container mt-3">
            <h1 class="py-2">Start a Discussion</h1>
            <form action= "'. $_SERVER['REQUEST_URI'].'" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Problem title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" required>
                    <div id="emailHelp" class="form-text">Keep your title short and crisp as possible.</div>
                </div>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
                <div class="form-group">
                    <label for="description" class="mb-2">Ellaborate Your Concern</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-2">Submit</button>
            </form>
        </div>';
        }
        else{
            echo '<div class="container">
            <h1 class="py-0 mt-3">Start a Discussion</h1>
           <p class="fs-3 font-light my-0"> Please login to start a Discussion</p>
            </div>';
        }
    ?>
    <!-- above form will appear as descripted in above comment -->

    <!-- threads list questions/answers container starts from here ,here we will render the question-threadslists-->
    <div class="container mt-4">
        <h1 class="mb-2">Browse Questions</h1>
        <!-- will echo threads from database and siaplay in this cards -->
        <?php
            // rendering threads from database using categries id:
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
            $result = mysqli_query($conn,$sql);
            $noThread = true;
                while($row = mysqli_fetch_assoc($result)){
                    $noThread = false;
                    $id = $row['thread_id'];
                    $title = $row['thread_title'];
                    $desc = $row['thread_desc'];
                    $threadtime = $row['timestamp'];
                    // adding user-email to the posted threads from here to
                    $thread_user_id = $row['thread_user_id'];
                    $sql2 = "SELECT user_email FROM `users` WHERE sno = '$thread_user_id'";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $threadposter_email = $row2['user_email']; //here adding user-email to the posted threads ends//

                echo' <div class="d-flex my-2 align-items-center">
                        <div class="flex-shrink-0">
                            <img src="/myforum/img/profile_img.jpg" width="64px" alt="...">
                        </div>
                        <!-- real threadslisting starts here -->
                        <div class="flex-grow-1 ms-3">
                            <h4 class="my-0">
                            <div class="text-end"><p class="fs-6 font-light mb-0 mt-1 font-monospace"> Thread Posted by: '.$threadposter_email.' | posted on '. $threadtime.'</p></div>
                             <a href="thread.php?threadid='.$id.'" class="text-dark text-decoration-underline py-0 fw-bold fs-5">'.substr($title,0,25).'..</a></h4>
                            <p class="fs-6">'.$desc.'</p>
                        </div>
                    </div>
                    <hr class="my-1">';
                }
                if($noThread){
                // this will only be seen if their is no question in the thread section
                echo '<div class="card mb-3">
                    <div class="card-body py-4 bg-light">
                        <p class="card-title fs-1 fw-normal">No Threads Found</p>
                        <p class="card-text fw-light fs-4">Be the first person to ask a question.</p>
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