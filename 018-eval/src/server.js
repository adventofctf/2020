var port = 8080;
var express = require('express');
var app = express();
var fs = require("fs");
var bodyParser = require('body-parser');
var jsonParser = bodyParser.json();

app.use('/static', express.static('public'));

app.post('/calc', jsonParser, function (req, res) {
  var body = req.body.calc;
  var r = eval(body);
  res.header("Content-Type", "text/plain");
  res.end(r.toString());
})

app.get('/', function(req, res){
  res.sendFile(__dirname + '/public/index.html');
});

var server = app.listen(port, function () {
  var host = server.address().address
  var port = server.address().port
  console.log("Example app listening at http://%s:%s", host, port)
})


process.on('SIGINT', function() {
  console.log( "\nGracefully shutting down from SIGINT (Ctrl-C)" );
  process.exit(1);
});
