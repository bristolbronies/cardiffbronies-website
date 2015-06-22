var app = app || {};

app.navigation = {};

app.navigation.mobileNavigation = {
	bindControls: function() {
		$(document).on("click", "[data-navigation-toggler]", function(e) {
			e.preventDefault();
			$(this).trigger("blur");
			$(this).toggleClass("navigation-toggler--active");
			$("[data-navigation]").toggleClass("navigation--active");
		});
	}
};

app.navigation.stickyNavigation = {
	$header: $("[data-header]"),
	lastScrollPos: 0,
	init: function() {
		var scrollPos = $(window).scrollTop();
		if(scrollPos > 0) {
			this.glue();
			if(scrollPos > 200 && scrollPos > this.lastScrollPos && $("[data-navigation].navigation--active").length === 0) {
				this.hide();
			}
			else {
				this.show();
			}
		}
		else {
			this.deglutinate();
			this.show();
		}
		this.lastScrollPos = scrollPos;
	},
	glue: function() {
		if($("[data-header].header--sticky").length === 0) {
			this.$header.addClass("header--sticky");
			if($("[data-header-placeholder]").length === 0) {
				var $placeholder = $("<div data-header-placeholder>").css({ "height": this.$header.outerHeight(true) });
				this.$header.before($placeholder);
			}
		}
	},
	deglutinate: function() {
		this.$header.removeClass("header--sticky");
		$("[data-header-placeholder]").remove();
	},
	hide: function() {
		this.$header.addClass("header--hide");
	},
	show: function() {
		this.$header.removeClass("header--hide");
	}
};

$(document).ready(function() {
	app.navigation.mobileNavigation.bindControls();
	app.navigation.stickyNavigation.init();
});

$(window).scroll(function() {
	app.navigation.stickyNavigation.init();
});