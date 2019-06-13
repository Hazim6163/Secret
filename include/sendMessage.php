<?php
include 'db.php';

if(isset($_POST['message'], $_POST['username'], $_POST['secret_channel'])){
   echo save_message_to_channel_messages_table($_POST['secret_channel'], $_POST['username'], $_POST['message']);
}

?>
