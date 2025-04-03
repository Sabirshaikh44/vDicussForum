<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>vDiscuss - Coding Forums</title>
    <style>
    #container{
        min-height: 85vh;
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <div class="container mt-4" id="container">
        <h1>Contact us</h1>
        <hr class="mt-1">
        <form action="/myforum/partials/_contacthandle.php" method="post">
            <div class="mb-4">
                <label for="senderemail" class="form-label">Enter your Email address</label>
                <input type="email" name="senderemail" class="form-control" id="senderemail"
                    placeholder="Enter your email here.." required>
            </div>
            <div class="mb-4">
                <label for="senderdescription" class="form-label">Enter Query Below \ Write to us: </label>
                <textarea class="form-control" id="senderdesc" name="senderdesc" rows="6" required></textarea>
            </div>
            <button class="btn btn-success container-fluid mt-2 py-2 ">Send</button>
        </form>
        <div class="container text-center my-3">
            <h1 class="mt-2">vDiscuss thanks you for visiting our forum.</h1>
            <h3 class="mt-3">GREETING FROM CREATOR : <small class="mx-2">Sabir Imtiyaz shaikh.</small></h3>
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