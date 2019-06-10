<?php
if(isset($_POST['password'])){
    $pass = $_POST['password'];
    if($pass == 1101998){
        $username = $_POST['username'];
        include 'include/header.php';
        ?>
        
        
<div class="container-fluid  h-100 wrapperSetName" style="">
    <div class="row h-100 justify-content-center " style="padding-top: 10vh">
        <div class="col-12  col-lg-6 col-xl-4">
            <table class="table table-borderless messageTable" id="messagesTable">
              <thead>
                <!--<tr>
                  <th scope="col" class="messageTo">marha7adhjas ajksdhas jhaskjd ashdjka skjdkjasdj kjasdkj askjd a</th>
                </tr> -->
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="messageTo"></th>
                </tr>
                <tr>
                  <th scope="row" class="messageFrom"></th>
                </tr>
              </tbody>
            </table>
            <script>
                var objDiv = document.getElementById("messagesTable");
                objDiv.scrollTop = objDiv.scrollHeight;
            </script>
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