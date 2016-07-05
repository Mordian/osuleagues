modes = ['Standard', 'Taiko', 'Catch the Beat', 'Mania'];

function formSubmit() {
	var button = document.getElementById('placement-button');
	button.disabled = true;
	button.value = "Working... it could take a while";
}

function lookupLeagues(leagueId) {
	$('#leagueName').html(modes[leagueId]);
	$('#leaguesContainer').show();

	$.ajax({
		url: 'api/leagues/' + leagueId
	}).done(function(response) {
		$('#leagues').html(response)
	});
}