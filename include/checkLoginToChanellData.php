<?php
include 'db.php';

if(isset($_POST['secret_chanell'], $_POST['username'], $_POST['password'])){
    if (user_inside_chanell_validate($_POST['username'], $_POST['password'], $_POST['secret_chanell'])){
        session_start();
        $_SESSION['secret_chanell'] = $_POST['secret_chanell'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        session_write_close();
        header("Location: main.php");
        
    }else{
        session_start();
        $_SESSION['secret_chanell'] = $_POST['secret_chanell'];
        $_SESSION['login_information_error'] = true;
        session_write_close();
        header("Location: loginFormToChanell.php");
    }
    
}else{
    header("Location: ../index.php");
}
?>