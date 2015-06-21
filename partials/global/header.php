	<header class="header" id="top" role="banner" data-header>
		<div class="header__branding">
			<a href="/">
				<?php bloginfo("blogname"); ?>
			</a>
		</div>
		<nav class="navigation" id="navigation" role="navigation" data-navigation>
			<a href="#bottom" class="navigation__toggler" data-navigation-toggler>
				<span class="icon icon--menu navigation__toggler__icon"></span>
				Menu
			</a>
			<div class="navigation__menu" data-navigation-menu>
				<?php
					wp_nav_menu(array(
						"theme_location" => "primary",
						"menu_class" => "navigation__list navigation__list--primary",
						"container" => false,
						"items_wrap" => '<ul class="%2$s">%3$s</ul>',
						"walker" => new bb_navigation_walker
					));
				?>
				<?php
					wp_nav_menu(array(
						"theme_location" => "secondary",
						"menu_class" => "navigation__list navigation__list--secondary",
						"container" => false,
						"items_wrap" => '<ul class="%2$s">%3$s</ul>',
						"walker" => new bb_navigation_walker
					));
				?>
			</div>
		</nav>
	</header>