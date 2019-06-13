<?php
require '../vendor/autoload.php';


$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "secret_messanger";

foreach($db as $key => $value){
define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);
mysqli_set_charset($connection, 'utf8');

if(!$connection){
    echo 'not connected';
}


$secret_channel_db  = null;
$secret_channel  = null;


$options = array(
                'cluster' => 'eu',
                'encrypted' => true
            );

$pusher = new Pusher\Pusher(
    '94c41e98c959a6147056',
    '544cff687fb19126275e',
    '802920',
    $options
  );

function secret_channel_validate($secret_channel){
    global $connection;
    $secret_channel_db  = null;
    
    
    $secret_channel = mysqli_real_escape_string($connection, $secret_channel);
    
    // set up the query
    $query = "SELECT * FROM secret_channels WHERE secret_channel = '{$secret_channel}' ";
    $get_channel_query = mysqli_query($connection, $query);
    
    // if there's an error :
    if(!$get_channel_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_array($get_channel_query)){
        $secret_channel_db = $row['secret_channel'];
    }
    
    if($secret_channel == ''){
        return false;
    }else if($secret_channel == $secret_channel_db){
        return true;
    }else{
        return false;
    }
}

function user_inside_channel_validate($username, $password, $secret_channel){
    global $connection;
    $username_db = null;
    $password_db = null;
    $secret_channel_db = null;
    
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $secret_channel = mysqli_real_escape_string($connection, $secret_channel);
    
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $get_user_query = mysqli_query($connection, $query);  
    
    // if there's an error :
    if(!$get_user_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_array($get_user_query)){
        $secret_channel_db = $row['secret_channel'];
        $username_db = $row['username'];
        $password_db = $row['password'];
    }
    
    if($secret_channel == '' || $username == '' || $password == ''){
        return false;
    }else if($secret_channel_db == $secret_channel && $username_db == $username && $password_db == $password){
        return true;
    }else{
        return false;
    }
    
    
}

function get_channel_des($secret_channel){
    global $connection;
    $secret_channel_des = null;
    
    $secret_channel = mysqli_real_escape_string($connection, $secret_channel);
    
    // set up the query
    $query = "SELECT * FROM secret_channels WHERE secret_channel = '{$secret_channel}' ";
    $get_channel_query = mysqli_query($connection, $query);
    
    // if there's an error :
    if(!$get_channel_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_array($get_channel_query)){
        $secret_channel_des = $row['description'];
    }
    
   return $secret_channel_des; 
}

function save_message_to_channel_messages_table($secret_channel, $username, $message){
    global $connection;
    global $pusher;
    
    $username = mysqli_real_escape_string($connection, $username );   
    $message = mysqli_real_escape_string($connection, $message );  
    $secret_channel = mysqli_real_escape_string($connection, $secret_channel );  
    
    $messageTableStatus = check_channel_messages_table($secret_channel);
    if($messageTableStatus != 0){
        $messages_table_name = "messages_".$secret_channel;
        $query = "INSERT INTO ".$messages_table_name."(username, message_body, secret_channel) ";
                 
        $query .= "VALUES('{$username}','{$message}','{$secret_channel}') ";

        $save_message_query = mysqli_query($connection, $query);  
        
        
        if($save_message_query){
            $last_id = mysqli_insert_id($connection);
            $data['message_id'] = $last_id;
            $data['message_body'] = $message;
            $data['username'] = $username;
            $data['secret_channel'] = $secret_channel;
            $pusher->trigger($secret_channel, 'send_message', $data);
            return $message; 
        }else{
            die("QUERY FAILED" . mysqli_error($connection));
            return "message cant be saved";
        }


             
        
    }else{
        return "failed to save message : messages table cant be created or founded";
    }
    
}

/*
        this function will returned a int number : 
        table already exist return 1
        new table craeted return 2
        failed to finde and create the table 0
        
*/
function check_channel_messages_table($secret_channel){
    global $connection;
    
    $secret_channel = mysqli_real_escape_string($connection, $secret_channel);
    
    // check if the messages table already exist:
    $query = "SHOW TABLES LIKE 'messages_".$secret_channel."';";
    if ($finde_table_result = $connection->query($query)) {
        
        if($finde_table_result->num_rows >= 1) {
            return 1;
        }else{
            // create table query if the last query retun rows < 1: 
            if(create_channel_messages_table($secret_channel)){
                return 2;
            }else{
                return 0;
            }
        }
    }else {
        die("QUERY FAILED" . mysqli_error($connection));
        return 0;
    }
    
}

/*
    will return true if table craeted false if not
*/
function create_channel_messages_table($secret_channel){
    global $connection;
    
    $secret_channel = mysqli_real_escape_string($connection, $secret_channel);
    
    $query =" CREATE TABLE `secret_messanger`.`messages_".$secret_channel."` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `message_body` TEXT NOT NULL , `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `secret_channel` INT NOT NULL , `message_status` INT(1) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
            
    if ($create_table_result = $connection->query($query)) {
        return true;
    }else{
        die("Create table query cannot be completed" . mysqli_error($connection));
        return false;
    }
}

?>
