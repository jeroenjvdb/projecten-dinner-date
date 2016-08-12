$(document).ready(function(){
	var friendid;
	var timerId;

	$('.chatPerson').click(function(e){
		// console.log(timerId);
		id = e.currentTarget.id;
		friendid = id;
		if(timerId)
		{
			clearInterval(timerId);
		}
		openChatbox(id);
	});

	

	

	function openChatbox(id){
		// friendid = id;
		// console.log('openChatbox');


		function loadChat(){
			$.ajax({
				type: 'get',
				url: 'chat/' + friendid,
				success: function(data, status){
					// console.log(status);
					// console.log(data);
					makeChat(data, id);

				}
			});
		}

		loadChat();
		timerId = setInterval(loadChat, 2500);

		$(document).on('click', '#btn-chat', postMessage);

		function postMessage(){
		// console.log('post');
		// id = 1;
		if($('#btn-input').val())
		{
			var input = $('#btn-input').val();
			$('#btn-input').val('');
			$.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
			// console.log('id: ' +friendid);
			$.ajax({
				type: 'post',
				data: {input: input },
				url: 'chat/post/' + friendid ,
				success: function(data, status){
					// console.log(data);
				},
				error: function(status, een){
					// console.log(status);
				}

			});
		}
	}

		function makeChat(data, id){
			// console.log($('#chatbox #' + id).text());
			var chatbox = $('#chatbox #chatForm');
			// $('#chatPersons').removeClass('col-md-12').addClass('col-md-3');
			// $('#chatForm').addClass('col-md-9');
			// console.log(id);
			if($('#chatbox #chatForm .chat').text())
			{
				// console.log('$...');
				// console.log($('#chatbox #chatForm .chat').text());
				$('#chatbox #chatForm .chat').text('');
			} else
			{
				// console.log($('#chatbox #chatForm .chat').text());

				chatbox.text('');
				chatbox.append('<ul class="chat list-unstyled"></ul><div class="panel-footer"><div class="input-group"><input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." /><span class="input-group-btn"><button class="btn btn-default btn-sm" id="btn-chat">Send</button></span></div></div>');
			}
			var chatboxContent = $('#chatbox ul.chat')
			for(var i = 0; i<data.length; i++)
			{
				// console.log(data[i]);
				chatboxContent.append(makeChatMessage(data[i], id));
			}
			// chatbox.append('');

		}

		function makeChatMessage(data, id){
			html = '';
			if(data['receiver_id'] == id){
				html += '<li class="right clearfix"><span class="chat-img pull-right height-20"><img src="'+data["picture_sender"]["picture_url"]+ '" alt="User Avatar" class="img-circle height-50 width-50" />';
			} else
			{
				html += '<li class="right clearfix"><span class="chat-img pull-right"><img src="'+data["picture_sender"]["picture_url"]+ '" alt="User Avatar" class="img-circle height-50 width-50" />';
			}
			// html +=' clearfix"><span class="chat-img pull-left">';
        html += '';
    	html +='</span>';
     	html +=   '<div class="chat-body clearfix">';
		html +=  '<div class="header">';
	  	html +=  '<strong class="primary-font">' + data.sender.surname + ' ' + data.sender.name + '</strong> <small class="pull-right text-muted">';
	   	html += '<span class="glyphicon glyphicon-time"></span>' + data['created_at'] + '</small>';
		html +='</div>';
		html += '<p>' + data.message + '</p>'
        html += '</div>';
    	html += '</li>';

				return html;
		}
	}

});