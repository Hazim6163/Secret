<?php
$title = 'Chat Name';
if(isset($_POST['password'])){
                $pass = $_POST['password'];
                if($pass == 1101998){
                    include 'include/header.php';
                    include 'include/setName/form.php';
                    ?>
                    


    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
<?php
     include 'footer.php';               
    }else{
        echo "<script>location.href='http://192.168.2.108/workstation/Secret/index.php';</script>";
    }

}else{
    echo "<script>location.href='http://192.168.2.108/workstation/Secret/index.php';</script>";
}
?>