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
        
        include 'header.php';
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
             <input type="hidden" name="username" value=<?php echo $username;?>
             <input type="hidden" name="date" value= <?php echo date('m/d/Y h:i:s a', time());?> >
              
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
    include 'footer.php';   
    }else{
        header("Location: ../index.php");
    }
    
}else{
    header("Location: ../index.php");
}
?>