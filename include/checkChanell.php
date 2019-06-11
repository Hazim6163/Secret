<?php
include 'db.php';


if(isset($_POST['secret_chanell'])){
    
    $secret_chanell = $_POST['secret_chanell'];
    $secret_chanell = mysqli_real_escape_string($connection, $secret_chanell);
    
    // set up the query
    $query = "SELECT * FROM secret_chanells WHERE secret_chanell = '{$secret_chanell}' ";
    $get_chanell_query = mysqli_query($connection, $query);
    
    // if there's an error :
    if(!$get_chanell_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_array($get_chanell_query)){
        $secret_chanell_db = $row['secret_chanell'];
    }
    
    if($secret_chanell == ''){
        header("Location: ../index.php");;
    }else if($secret_chanell == $secret_chanell_db){
        session_start();
        $_SESSION['secret_chanell'] = $secret_chanell;
        header("Location: loginToChanell.php");
        exit();
    }else{
        header("Location: ../index.php");
    }
    
}else{
    echo "<script>location.href='http://192.168.2.108/workstation/secret/index.php';</script>";
}
?>