<?php 
include 'db.php';
$title = 'Messenger';

session_start();
if(isset($_SESSION['username'], $_SESSION['password'], $_SESSION['secret_chanell'])){
    // save the params to use it later in the page :
    $secret_chanell = $_SESSION['secret_chanell'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    
    if (user_inside_chanell_validate($username, $password, $secret_chanell)){
        unset($_SESSION['password']);
        session_write_close();
        //echo "Welcome ". $username;
        //echo "<br> in the chanell ".$secret_chanell;
        
    }else{
        header("Location: ../index.php");
    }
    
}else{
    header("Location: ../index.php");
}
?>