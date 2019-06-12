function sendMessage() {
    var secretChanell = "<?php echo $secret_chanell ?>";
    var username = "<?php echo $username ?>";
    var message = document.getElementById('message').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("messagesTable").innerHTML = this.responseText;
        console.log(this.responseText);
        }
    };
    xhttp.open("POST", "sendMessage.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var msgArgs = "username=";
    msgArgs += username;
    msgArgs += "&message=";
    msgArgs += message;
    msgArgs += "&secret_chanell=";
    msgArgs += secretChanell;

    xhttp.send(msgArgs);
}
