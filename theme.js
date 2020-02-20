$( "#buto" ).click(function(event) {
	event.preventDefault();

	$.ajax({
	url:'theme.php',
	type: 'POST',
	data: 'id1=' + $("#test1").val() + '&theme1=' + $("#theme").val(),

	success : function(result)
	{
		
		 location.reload(true);

	},
	error : function(erreur)
	{
		alert("non");
	}
	})

})