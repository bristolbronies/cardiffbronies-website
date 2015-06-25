var app = app || {};

app.ui = {
	fuzzyDates: function() {
		$("[data-timeago]").timeago();
	}
}

$(document).ready(function() {
	app.ui.fuzzyDates();
});