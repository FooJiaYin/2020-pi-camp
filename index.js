var express = require('express');
var app = express();
var server = require('http').Server(app);
// const port = 3000;

//  Import files from source folder( css, js, assets)
app.use('/', express.static(__dirname + '/'));


app.get('/', function(req, res) {
    res.sendFile(__dirname + '/index.html');
});

server.listen(process.env.PORT || 3000, function() {
    console.log('Listening on ' + server.address().port);
});
// app.listen(port, () => console.log(`Example app listening at http://localhost:${port}`))