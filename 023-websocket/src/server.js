var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var port = process.env.PORT || 3000;
var atob = require('atob');
var btoa = require('btoa');

const { exec } = require('child_process');

function isBase64(str) {
  if (str ==='' || str.trim() ===''){ return false; }
  if (str === "test") { return false; }
  try {
    return btoa(atob(str)) == str;
  } catch (err) {
    return false;
  }
}

app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
});

io.on('connection', function(socket){
  console.log("Socket "+ socket.id );
  socket.on('chat message', function(msg){
    console.log("Message: " + msg.command + " socket " + socket.id);

    switch (msg.command) {
      case "help":
        io.to(socket.id).emit('chat message', {message:"Allowed message types are: help, execute and empty"});
        break;
      case "execute":
        if (!msg.message) {
          io.to(socket.id).emit('chat message', {message:"message is missing"});
        }
        else if (isBase64(msg.message)) {
          var command=atob(msg.message);
          console.log("Command attempt: " + command);
          exec("/bin/ls '" + command + "'",{shell: '/bin/bash'}, (err, stdout, stderr) => {
            if (err) {
              io.to(socket.id).emit('chat message', {command:"code", message:"ERR: " + err});
              // node couldn't execute the command
              return;
            }

            // the *entire* stdout and stderr (buffered)
            if (stdout) {
              io.to(socket.id).emit('chat message', {command:"code", message:"STDOUT: " + stdout});
            }
            if (stderr) {
              io.to(socket.id).emit('chat message', {command:"code", message:"STDERR: " + stderr});
            }
          });
        } else {
          io.to(socket.id).emit('chat message', {message:"Invalid BASE64"});
        }
        break;
      default:
        io.to(socket.id).emit('chat message', msg);
    }

  });
});

http.listen(port, function(){
  console.log('listening on *:' + port);
});
