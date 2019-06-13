<?php 
include 'db.php';
$title = 'Messenger';

session_start();
if(isset($_SESSION['username'], $_SESSION['password'], $_SESSION['secret_channel'])){
    // save the params to use it later in the page :
    $secret_channel = $_SESSION['secret_channel'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $secret_channel_des = $_SESSION['secret_channel_description'];
    
    if (user_inside_channel_validate($username, $password, $secret_channel)){
        unset($_SESSION['password']);
        session_write_close();
        
        include 'header.php';
?>


<div class="container-fluid  h-100" style="padding-left: 0px; padding-right: 0px;">
    <div class="row h-100 justify-content-center no-gutters" >
        <div class="col-12  col-lg-6 col-xl-4">
           <div class="channelDes">
               <img src="img/icons8_Romance_104px.png" alt="icon" style="height: 7vh; width:7vh; display:inline; padding: 1vh;"><?php echo $secret_channel_des?>
           </div>
            <table class="table table-borderless messageTable" style="padding-left: 15px; padding-right: 15px;" id="messagesTableTop">
              <tbody id="messagesTable">
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
                var objDiv = document.getElementById("messagesTableTop");
                objDiv.scrollTop = objDiv.scrollHeight;
            </script>
            
            <!-- send message form -->
            <form method="post" autocomplete="off" class="sendMessageForm" style="padding-left: 15px; padding-right: 15px;" onsubmit="sendMessage();return false">
             <input type="hidden" id="username" value="<?php echo $username;?>">
             <input type="hidden" id="secret_channel" value="<?php echo $secret_channel;?>">
              
              <div class="form-row justify-content-center">
                <div class="col-9 messageContainerWrapper">
                  <input type="text" class="form-control messageContainer" id="message" >
                </div>
                <div class="col-3 col-xl-2 align-self-center" style="padding:0px;">
                  <button type="submit" id="sendMsgBtn" class="btn btn-danger sendMessageBtn"><i class="far fa-paper-plane"></i></button>
                </div>
              </div>
              
            </form>
            
        </div>
    </div>
</div>
<script src="https://js.pusher.com/4.4/pusher.min.js"></script> 
<script type="text/javascript" src="sendMessage.js"></script>
<script type="text/javascript" src="getMessage.js"></script>
<?php
    include 'footer.php';   
    }else{
        header("Location: ../index.php");
    }
    
}else{
    header("Location: ../index.php");
}
?>