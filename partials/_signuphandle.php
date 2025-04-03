<?php
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $cpassword = $_POST['signupcPassword'];

    //Check if exist user:
    $existsql = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        $showError = "already in use";
    }
    else{
        // check if both password and confirmpassword are same:
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `created_at`) VALUES ('$email', '$hash',current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: /myforum/index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError =  "Passwords do not match";
        }
    }
    header("Location: /myforum/index.php?signupsuccess=false&error = $showError");
}
?>