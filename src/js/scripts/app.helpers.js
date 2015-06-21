var app = app || {};

app.helpers = {
	isSmallScreen: function(breakpoint) {
		breakpoint = typeof breakpoint != 'undefined' ? breakpoint : "(min-width: 770px)";
		if(window.matchMedia(breakpoint).matches) {
			return false;
		}
		else {
			return true;
		}
	}
}