$( "#follow" ).click(function(event) {
	event.preventDefault();
//if ($('#follow').val() == 'Suivre')
//{
if ($('#follow').val() == 'Ne plus suivre') 
{
	$.ajax({
	url:'unfollow.php',
	type: 'POST',
	data: 'id=' + $("#test").val(),
	success : function(result)
	{
		$('#follow').val('Suivre');

	},
	error : function(erreur)
	{
		$('#follow').val('Vous ne suivez pas ce membre');
	}
	})
}

else{
	$.ajax({
	url:'follow.php',
	type: 'POST',
	data: 'id=' + $("#test").val(),
	success : function(result)
	{
		$('#follow').val('Ne plus suivre');

	},
	error : function(erreur)
	{
		$('#follow').val('Vous suivez déjà ce membre');
	}
	})
	}

})
