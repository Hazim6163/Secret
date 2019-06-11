<?php
if(isset($_POST['password'])){
    $pass = $_POST['password'];
    if($pass == 1101998){
        $username = $_POST['username'];
        include 'include/header.php';
        ?>
        
        
<div class="container-fluid  h-100">
    <div class="row h-100 justify-content-center ">
        <div class="col-12  col-lg-6 col-xl-4">
            <table class="table table-borderless messageTable" id="messagesTable">
              <thead>
                <!--<tr>
                  <th scope="col" class="messageTo">marha7adhjas ajksdhas jhaskjd ashdjka skjdkjasdj kjasdkj askjd a</th>
                </tr> -->
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="messageToWrapper">
                      <p class="messageTo">مرحبا كيفك</p>
                      <p class="messageTo">    مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك </p>
                  </th>
                </tr>
                <tr>
                  <th scope="row" class="messageFromWrapper">
                      <p class="messageFrom">مرحبا كيفك</p>
                      <p class="messageFrom">    مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك مرحبا كيفك </p>
                  </th>
                </tr>
              </tbody>
            </table>
            <script>
                var objDiv = document.getElementById("messagesTable");
                objDiv.scrollTop = objDiv.scrollHeight;
            </script>
            
            <!-- send message form -->
            <form action="" method="post" autocomplete="off" class="sendMessageForm">
             <input type="hidden" name="username" value=<?php echo $username;?></inpu>
             <input type="hidden" name="date" value=<?php date('m/d/Y h:i:s a', time());?>>
              
              <div class="form-row justify-content-center">
                <div class="col-9 messageContainerWrapper">
                  <input type="text" class="form-control messageContainer" id="inlineFormInputName" >
                </div>
                <div class="col-3 col-xl-2 align-self-center" style="padding:0px;">
                  <button type="submit" class="btn btn-danger sendMessageBtn"><i class="far fa-paper-plane"></i></button>
                </div>
              </div>
              
            </form>
            
        </div>
    </div>
</div> 
        
        
        
        
        
        
        
        
        
        
        
<?php
        include 'include/footer.php';
    }else{
        echo "<script>location.href='http://192.168.2.108/workstation/Secret/index.php';</script>";
    }
}else{
    echo "<script>location.href='http://192.168.2.108/workstation/Secret/index.php';</script>";
}


?>