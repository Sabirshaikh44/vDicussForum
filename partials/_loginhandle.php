<?php
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

    $sql = "SELECT * FROM `users` WHERE user_email = '$loginEmail'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
       $row = mysqli_fetch_assoc($result);
        if(password_verify($loginPassword,$row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $loginEmail;
            echo "logged in as ".$loginEmail;
        }
        header("Location: /myforum/index.php");
    }
    else{
        header("Location: /myforum/index.php");
    }
}
?>