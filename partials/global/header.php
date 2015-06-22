	<header class="header" id="top" role="banner" data-header>
		<div class="header__bar">
			<a href="/" class="header__branding">
				<?php bloginfo("blogname"); ?>
			</a>
			<a href="#bottom" class="navigation-toggler" data-navigation-toggler>
				<span class="icon icon--menu navigation-toggler__icon"></span>
				Menu
			</a>
		</div>
		<nav class="navigation header__navigation" id="navigation" role="navigation" data-navigation>
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

	<!--[if lt IE 9]>
		<div class="browser-warning">Your web browser is old. So old. <a href="http://www.harkavagrant.com/?id=259">Old as balls.</a> Your browser is an  functional and security nightmare wrapped up in an executable and we don't want to touch it with a ten foot bargepole. Do the world a favour and <a href="outdatedbrowser.com/en">download a <em>real</em> web browser</a> for the best web experience.</div>
	<![endif]-->
