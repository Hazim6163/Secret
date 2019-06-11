<?php
session_start();
if(isset($_SESSION['secret_chanell'])){
    
    // save the secret chanell to use it in the page :
    $secret_chanell = $_SESSION['secret_chanell'];
    unset($_SESSION['secret_chanell']);
    session_write_close();
    
}else{
    header("Location: ../index.php");
}


?>