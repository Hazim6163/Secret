function sendMessage() {
    var secretChanell = "<?php echo $secret_chanell ?>";
    var username = "<?php echo $username ?>";
    var message = document.getElementById('message').value;
    if(message.length != 0 && message != " "){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var messageTable = document.getElementById("messagesTable");
            var tr = document.createElement("tr");
            var th = document.createElement("th");
            var messagePar = document.createElement("p");
            var messageNode = document.createTextNode(this.responseText);

            th.className += "messageToWrapper";
            messagePar.className += "messageTo";

            messagePar.appendChild(messageNode);
            th.appendChild(messagePar);
            tr.appendChild(th);
            messageTable.appendChild(tr);


            //to scroll down to the last message
            var objDiv = document.getElementById("messagesTableTop");
            objDiv.scrollTop = objDiv.scrollHeight;
        }
    }
    
    }else{
        return;
    }
    xhttp.open("POST", "sendMessage.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var msgArgs = "username=";
    msgArgs += username;
    msgArgs += "&message=";
    msgArgs += message;
    msgArgs += "&secret_chanell=";
    msgArgs += secretChanell;

    xhttp.send(msgArgs);
    
    // to set the message box empty
    document.getElementById('message').value="";
    
    
}
