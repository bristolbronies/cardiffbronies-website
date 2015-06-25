var app = app || {};

app.meetGrid = {
	animateGrid: function() {
		$(".meet-grid").addClass("meet-grid--animate");
	}
}

$(window).load(function() {
	app.meetGrid.animateGrid();
})