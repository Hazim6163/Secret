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
    alert(obj.message[0].message_body);
});