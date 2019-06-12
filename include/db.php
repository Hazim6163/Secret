<?php

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


$secret_chanell_db  = null;
$secret_chanell  = null;

function secret_chanell_validate($secret_chanell){
    global $connection;
    $secret_chanell_db  = null;
    
    
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
        return false;
    }else if($secret_chanell == $secret_chanell_db){
        return true;
    }else{
        return false;
    }
}

function user_inside_chanell_validate($username, $password, $secret_chanell){
    global $connection;
    $username_db = null;
    $password_db = null;
    $secret_chanell_db = null;
    
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $secret_chanell = mysqli_real_escape_string($connection, $secret_chanell);
    
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $get_user_query = mysqli_query($connection, $query);  
    
    // if there's an error :
    if(!$get_user_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_array($get_user_query)){
        $secret_chanell_db = $row['secret_chanell'];
        $username_db = $row['username'];
        $password_db = $row['password'];
    }
    
    if($secret_chanell == '' || $username == '' || $password == ''){
        return false;
    }else if($secret_chanell_db == $secret_chanell && $username_db == $username && $password_db == $password){
        return true;
    }else{
        return false;
    }
    
    
}

function get_chanell_des($secret_chanell){
    global $connection;
    $secret_chanell_des = null;
    
    $secret_chanell = mysqli_real_escape_string($connection, $secret_chanell);
    
    // set up the query
    $query = "SELECT * FROM secret_chanells WHERE secret_chanell = '{$secret_chanell}' ";
    $get_chanell_query = mysqli_query($connection, $query);
    
    // if there's an error :
    if(!$get_chanell_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_array($get_chanell_query)){
        $secret_chanell_des = $row['description'];
    }
    
   return $secret_chanell_des; 
}

function save_message_to_chanell_messages_table($secret_chanell, $username, $message){
    global $connection;
    
    $username = mysqli_real_escape_string($connection, $username );   
    $message = mysqli_real_escape_string($connection, $message );  
    $secret_chanell = mysqli_real_escape_string($connection, $secret_chanell );  
    
    $messageTableStatus = check_chanell_messages_table($secret_chanell);
    if($messageTableStatus != 0){
        $messages_table_name = "messages_".$secret_chanell;
        $query = "INSERT INTO ".$messages_table_name."(username, message_body, secret_chanell) ";
                 
        $query .= "VALUES('{$username}','{$message}','{$secret_chanell}') ";

        $save_message_query = mysqli_query($connection, $query);  
        
        
        if($save_message_query){
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
function check_chanell_messages_table($secret_chanell){
    global $connection;
    
    $secret_chanell = mysqli_real_escape_string($connection, $secret_chanell);
    
    // check if the messages table already exist:
    $query = "SHOW TABLES LIKE 'messages_".$secret_chanell."';";
    if ($finde_table_result = $connection->query($query)) {
        
        if($finde_table_result->num_rows >= 1) {
            return 1;
        }else{
            // create table query if the last query retun rows < 1: 
            if(create_chanell_messages_table($secret_chanell)){
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
function create_chanell_messages_table($secret_chanell){
    global $connection;
    
    $secret_chanell = mysqli_real_escape_string($connection, $secret_chanell);
    
    $query =" CREATE TABLE `secret_messanger`.`messages_".$secret_chanell."` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `message_body` TEXT NOT NULL , `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `secret_chanell` INT NOT NULL , `message_status` INT(1) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
            
    if ($create_table_result = $connection->query($query)) {
        return true;
    }else{
        die("Create table query cannot be completed" . mysqli_error($connection));
        return false;
    }
}

?>
