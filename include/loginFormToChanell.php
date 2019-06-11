<?php
include 'db.php';

$title = "Login";
session_start();
if(isset($_SESSION['secret_chanell'])){
    
    // save the secret chanell to use it in the page :
    $secret_chanell = $_SESSION['secret_chanell'];
    unset($_SESSION['secret_chanell']);
    session_write_close();

    // validate the secret chanell:
    if (secret_chanell_validate($secret_chanell)){
        include 'header.php';
?>
 
<div class="container-fluid   wrapperSetName" style="">
    <div class="row h-100 justify-content-center " style="padding-top: 10vh">
        <div class="col-12  col-lg-6 col-xl-4">
            <img src="img/heart.png" class="img-fluid" alt="Heart"/>
            <form action="main.php" method="post" autocomplete="off">
                   <div class="form-group">
                        <input type="hidden" name="secret_chanell" value=<?php echo $secret_chanell;?></input>
                        <label for="username">Username</label>
                        <input type="text" autocomplete="off" class="form-control" name="username" aria-describedby="usernameHelp" placeholder="Enter your Username" style="background-color: #36282B; border:0px; color:#d6d4d4"></input>
                        <small id="usernameHelp" class="form-text " style="color: #954242; ">It will be your Name in the chat...</small>
                        <label for="username">Password</label>
                        <input type="password" autocomplete="off" class="form-control" name="password"  placeholder="Enter your Password" style="background-color: #36282B; border:0px; color:#d6d4d4"></input>
                  </div>
                 <button type="submit" class="btn btn-danger" name="login">Let's go</button>    
            </form>
        </div>
    </div>
</div>
        
<?php
    include 'footer.php';
    }else{
        header("Location: ../index.php");
    }
    
}else{
    header("Location: ../index.php");
    session_write_close();
}
?>  
