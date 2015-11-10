$(document).ready(function(){
	var id;
	$('.chatPerson').click(function(e){
		id = e.target.id;
		console.log(id);
		openChatbox(id);
	});

	

	

	function openChatbox(id){

		console.log('openChatbox');


		function loadChat(){
			$.ajax({
				type: 'get',
				url: '/home/chat/' + id,
				success: function(data, status){
					console.log(status);
					console.log(data);
					makeChat(data, id);

				}
			});
		}

		loadChat();
		window.setInterval(loadChat, 5000)


		$(document).on('click', '#btn-chat', postMessage);

		function postMessage(){
		console.log('post');
		id = 1;
		if($('#btn-input').val())
		{
			var input = $('#btn-input').val();
			$('#btn-input').val('');
			$.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });

			$.ajax({
				type: 'post',
				data: {input: input },
				url: '/home/chat/post/1' ,
				success: function(data, status){
					console.log(data);
				},
				error: function(status, een){
					console.log(status);
				}

			});
		}
	}

		function makeChat(data, id){
			// console.log($('#chatbox #' + id).text());
			var chatbox = $('#chatbox #chatForm');
			if($('#chatbox #chatForm .chat').text())
			{
				console.log('$...');
				console.log($('#chatbox #chatForm .chat').text());
				$('#chatbox #chatForm .chat').text('');
			} else
			{
				console.log($('#chatbox #chatForm .chat').text());

				chatbox.text('');
				chatbox.append('<ul class="chat"></ul><div class="panel-footer"><div class="input-group"><input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." /><span class="input-group-btn"><button class="btn btn-warning btn-sm" id="btn-chat">Send</button></span></div></div>');
			}
			var chatboxContent = $('#chatbox ul.chat')
			for(var i = 0; i<data.length; i++)
			{
				console.log(data[i]);
				chatboxContent.append(makeChatMessage(data[i], id));
			}
			// chatbox.append('');

		}

		function makeChatMessage(data, id){
			html = '';
			if(data['sender_id'] == id){
				html += '<li class="left clearfix"><span class="chat-img pull-left">';
			} else
			{
				html += '<li class="right clearfix"><span class="chat-img pull-right">';
			}
			// html +=' clearfix"><span class="chat-img pull-left">';
        html += '<img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />';
    html +='</span>';
     html +=   '<div class="chat-body clearfix">';
          html +=  '<div class="header">';
              html+=  '<strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">';
                   html += '<span class="glyphicon glyphicon-time"></span>12 mins ago</small>';
            html+='</div>';
            html += '<p>' + data.message + '</p>'
        html += '</div>';
    html += '</li>';
			return html;
		}
		// <li class="left clearfix"><span class="chat-img pull-left">
  //       <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
  //   </span>
  //       <div class="chat-body clearfix">
  //           <div class="header">
  //               <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
  //                   <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
  //           </div>
  //           <p>
  //               data.message
  //           </p>
  //       </div>
  //   </li>
	}

});