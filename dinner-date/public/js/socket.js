var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('chat-channel');

redis.on('message', function(channel, message){
    console.log(message);
    message = JSON.parse(message);
    io.emit(message);
});

server.listen(3000);
console.log('running on 3000');