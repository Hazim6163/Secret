<?php
include 'db.php';

if(isset($_POST['message'], $_POST['username'], $_POST['secret_chanell'])){
   echo save_message_to_chanell_messages_table($_POST['secret_chanell'], $_POST['username'], $_POST['message']);
}

?>