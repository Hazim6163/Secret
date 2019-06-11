<?php
include 'db.php';


if(isset($_POST['secret_chanell'])){
    
    if (secret_chanell_validate($_POST['secret_chanell'])){
        session_start();
        $_SESSION['secret_chanell'] = $_POST['secret_chanell'];
        session_write_close();
        header("Location: loginFormToChanell.php");
    }else{
        header("Location: ../index.php");
    }
    
}else{
    header("Location: ../index.php");
}

?>