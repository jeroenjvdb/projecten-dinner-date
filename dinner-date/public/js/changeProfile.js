$( document ).ready(function(){

	$('#edit').on('click', function()
	{
		console.log( $('#perfectDate').text() );
		$('#perfectDate').replaceWith('<textarea>' + $( '#perfectDate' ).text() + '</textarea>');
		$('#favoriteDish').replaceWith('<textarea>' + $('#favDish').val() + '</textarea>');
		$('#invisibleSubmit').removeClass('invisible');
	});

	$('.remove').on('click', function(e)
	{
		console.log(e.target.id);
	})

});
