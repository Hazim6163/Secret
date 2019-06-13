<?php
include 'db.php';

$title = "Login";
session_start();
if(isset($_SESSION['secret_channel'])){
    // save the secret channel to use it in the page :
    $secret_channel = $_SESSION['secret_channel'];
    unset($_SESSION['secret_channel']);
    session_write_close();

    // validate the secret channel:
    if (secret_channel_validate($secret_channel)){
        include 'header.php';
?>
 
<div class="container-fluid   wrapperSetName" style="">
    <div class="row h-100 justify-content-center " style="padding-top: 10vh">
        <div class="col-12  col-lg-6 col-xl-4">
            <img src="img/heart.png" class="img-fluid" alt="Heart"/>
            <form action="checkLoginTochannelData.php" method="post" autocomplete="off">
                   <div class="form-group">
                        <input type="hidden" name="secret_channel" value=<?php echo $secret_channel;?>>
                        <label for="username">Username</label>
                        <input type="text" autocomplete="off" class="form-control" name="username" aria-describedby="usernameHelp" placeholder="Enter your Username" style="background-color: #36282B; border:0px; color:#d6d4d4" value="">
                        <small id="usernameHelp" class="form-text " style="color: #954242; ">It will be your Name in the chat...</small>
                        <label for="username">Password</label>
                        <input type="password" autocomplete="off" class="form-control" name="password"  placeholder="Enter your Password" style="background-color: #36282B; border:0px; color:#d6d4d4" value="">
                  
                  <?php 
                    // to check if the user come from login page again or not
                    if(isset($_SESSION['login_information_error'])){
                        if($_SESSION['login_information_error']){
                        echo '<br><i class="fas fa-exclamation-triangle form-group" style="color:#dc143c; display:inline;"><a style="font-weight:500; display:inline; padding-left:10px; text-align:center">Please enter the correct Username and Password</a></i>
                        ';
                        }
                    }
                    ?>
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
