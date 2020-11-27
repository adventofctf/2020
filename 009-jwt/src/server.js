var port = 8080;
var http = require('http');          // core node.js http (no frameworks)
var url = require('url');            // core node.js url (no frameworks)
var app  = require('./lib/helpers'); // auth, token verification & render helpers
var c    = function(res){ /*  */ };
var mpath = require('path');
var fs = require('fs');

process.on('SIGINT', function() {
  console.log( "\nGracefully shutting down from SIGINT (Ctrl-C)" );
  process.exit(1);
});

http.createServer(function (req, res) {
  var path = url.parse(req.url).pathname;
  if( path === '/' || path === '/home' ) { app.home(res);           } // homepage
  else if( path === '/auth')    { app.handler(req, res);            } // authenticator
  else if( path === '/admin') { app.validate(req, res, app.done); } // private content
  else if( path === '/logout')  { app.logout(req, res, app.done);   } // end session
  else if(req.url.match("\.css$")){
    var cssPath = mpath.join(__dirname, 'public', req.url);
    var fileStream = fs.createReadStream(cssPath, "UTF-8");
    res.writeHead(200, {"Content-Type": "text/css"});
    fileStream.pipe(res) }
   else if(req.url.match("\.png$")){
    var cssPath = mpath.join(__dirname, 'public', req.url);
    var fileStream = fs.createReadStream(cssPath);
    res.writeHead(200, {"Content-Type": "image/png"});
    fileStream.pipe(res) }
 else                          { app.notFound(res);                } // 404 error
}).listen(port);

console.log("The server is running at " + port);
