	<footer class="footer" id="footer" role="contentinfo">
		<div class="footer__billboards">
			<?php get_template_part('partials/global/billboards'); ?>
		</div>
		<div class="footer__boilerplate">
			<?php
				wp_nav_menu(array(
					"theme_location" => "footer",
					"menu_class" => "bb-boilerplate__links",
					"container" => false,
					"items_wrap" => '<ul class="%2$s">%3$s</ul>',
					"walker" => new bb_naked_navigation_walker
				));
			?>
		</div>
	</footer>

