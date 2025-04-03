<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        $sender_email = $_POST['senderemail'];
        $sender_msg = $_POST['senderdesc'];
        echo $sender_email;
        echo $sender_msg;
        $sql = "INSERT INTO `contact` (`email`, `query_desc`, `email_time`) VALUES ('$sender_email', '$sender_msg', current_timestamp())";
        $result = mysqli_query($conn,$sql);
        echo var_dump($result);
        if($result){
            $sentAlert = true;
            header("Location: /myforum/contact.php?sentmailsuccess = true");
            exit();
        }
        else{
            $sentError = "mail cannot be sent";
            header("Location: /myforum/contact.php?sentmailsuccess = false&error = $sentError");
        }
    }
?>

