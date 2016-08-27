var socket = io('192.168.56.101:3000');
// var socket = io('37.139.3.121:3000');
console.log('in');
var chat = 'test';
new Vue({
    el: '.jumbotron',

    data:{
        chat:chat,
    },

    ready:function(){
        console.log('ready');
        socket.on('chat-channel:App\\Events\\ChatEvent', function(data){
            console.log('test');
            console.log(data);
        }.bind(this));
    }
})