<?php
include 'db.php';


if(isset($_POST['secret_channel'])){
    
    if (secret_channel_validate($_POST['secret_channel'])){
        session_start();
        $_SESSION['secret_channel'] = $_POST['secret_channel'];
        $_SESSION['login_information_error']=false;
        session_write_close();
        header("Location: loginFormTochannel.php");
    }else{
        header("Location: ../index.php");
    }
    
}else{
    header("Location: ../index.php");
}

?>