<?php
include 'db.php';

if(isset($_POST['secret_channel'], $_POST['username'], $_POST['password'])){
    if (user_inside_channel_validate($_POST['username'], $_POST['password'], $_POST['secret_channel'])){
        session_start();
        $_SESSION['secret_channel'] = $_POST['secret_channel'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['secret_channel_description'] = get_channel_des($_POST['secret_channel']);
        session_write_close();
        header("Location: main.php");
        
    }else{
        session_start();
        $_SESSION['secret_channel'] = $_POST['secret_channel'];
        $_SESSION['login_information_error'] = true;
        session_write_close();
        header("Location: loginFormTochannel.php");
    }
    
}else{
    header("Location: ../index.php");
}
?>