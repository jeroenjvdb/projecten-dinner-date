var socket = io('192.168.56.101:3000');
// var socket = io('37.139.3.121:3000');
console.log('in');
var chat = [];
new Vue({
    el: 'chat',

    data:{
        chat:chat,
    },

    ready:function(){
        socket.on('chat-channel:App\\Events\\ChatEvent', function(data){
            console.log('test');
        }.bind(this));
    }
})