function sendMessage() {
    var secretchannel = document.getElementById('secret_channel').value;
    var username = document.getElementById('username').value;
    var message = document.getElementById('message').value;
    console.log(secretchannel+"\n"+username+"\n"+ message)
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
    msgArgs += "&secret_channel=";
    msgArgs += secretchannel;

    xhttp.send(msgArgs);
    
    // to set the message box empty
    document.getElementById('message').value="";
    
    
}
