$(document).ready(function()
{
if ($('#verif_follow').val() == "non")
{
	$('#follow').val('Suivre');
	console.log('suivre');
}
if ($('#verif_follow').val() == "oui")
{
	$('#follow').val('Ne plus suivre');	
	console.log('ne plus suivre');
}

})