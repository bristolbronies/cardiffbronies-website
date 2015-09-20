var app = app || {};

app.ui = {
	fuzzyDates: function() {
		$("[data-timeago]").timeago();
	},
	killAllOrphans: function() {
		$("h1, h2, h3, h4, h5, h6").each(function(index, element) {
			$(this).html($(this).text().replace(/\s(?=[^\s]*$)/g, "&nbsp;"));
		});
	}
}

$(document).ready(function() {
	app.ui.fuzzyDates();
});

$(window).load(function() {
	//app.ui.killAllOrphans();
});