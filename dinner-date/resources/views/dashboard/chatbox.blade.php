<div id="1" class="chatPerson">
	Jeroen Van den Broeck
</div>
<div id="2" class="chatPerson">
	Matthias Van den Broeck
</div>

<script>
	$(document).ready(function(){
		$('.chatPerson').click(function(){console.log($(this).text())});
	});
</script>