<?php
if(isset($_POST['password'])){
                $pass = $_POST['password'];
                if($pass == 1101998){
                    ?>                  
<div class="container-fluid  h-100 wrapperSetName" style="">
    <div class="row h-100 justify-content-center " style="padding-top: 10vh">
        <div class="col-12  col-lg-6 col-xl-4">

            <img src="include/img/heart.png" class="img-fluid" alt="Heart">


            <form action="index2.php" method="post" autocomplete="off">
             <input type="hidden" name="password" value=<?php echo $pass;?></inpu>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" autocomplete="off" class="form-control" name="username" aria-describedby="usernameHelp" placeholder="Enter your Username">
                <small id="usernameHelp" class="form-text " style="color: indianred;">It will be your Name in the chat ...</small>
              </div>
              <br>
              <button type="submit" class="btn btn-danger" name="setChatName">Let's go</button>
            </form>
            
            
        </div>
    </div>
</div>                  
<?php             
    }else{
        echo "<script>location.href='http://192.168.2.108/workstation/Secret/index.php';</script>";
    }

}else{
    echo "<script>location.href='http://192.168.2.108/workstation/Secret/index.php';</script>";
}
?>
   

   