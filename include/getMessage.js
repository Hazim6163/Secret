var secretChanell = document.getElementById('secret_chanell').value;
var username = document.getElementById('username').value;

// creaete new pusher object to check and subscibe the channels 
var pusher = new Pusher('94c41e98c959a6147056', {
      cluster: 'eu',
      forceTLS: true
    });

// subscribe the secret channel
var channel = pusher.subscribe(secretChanell);
// set the event to send message
channel.bind('send_message', function(data) {
    // handel and add some text to make opration to convert the JSON to js obj
    var text = '{ "message" : [' + JSON.stringify(data) + ']}';
    // convert the JSON to js obj
    obj = JSON.parse(text);
    //{"message_id":5,"message_body":"tester","username":"Mustafa","secret_chanell":"1101998"}
    var message = obj.message[0];
    if(message.username != username && message.secret_chanell == secretChanell){
        var messageTable = document.getElementById("messagesTable");
        var tr = document.createElement("tr");
        var th = document.createElement("th");
        var messagePar = document.createElement("p");
        var messageNode = document.createTextNode(message.message_body);

        th.className += "messageFromWrapper";
        messagePar.className += "messageFrom";

        messagePar.appendChild(messageNode);
        th.appendChild(messagePar);
        tr.appendChild(th);
        messageTable.appendChild(tr);


        //to scroll down to the last message
        var objDiv = document.getElementById("messagesTableTop");
        objDiv.scrollTop = objDiv.scrollHeight;
       }
    
    
});