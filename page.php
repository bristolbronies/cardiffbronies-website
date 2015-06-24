<?php
	/*
		Template Name: Page - Generic
	*/
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
?>

<?php 
	if(have_posts()):
		while(have_posts()): the_post(); 
?>

	<main class="body" id="content" role="main">
		<div class="layout">
			<article class="article">
				<header class="article__header">
					<h1 class="article__title"><?php the_title(); ?></h1>
				</header>
				<div class="content article__body">
					<?php the_content(); ?>
				</div>
			</article>
		</div>
	</main>

<?php
		endwhile;
	endif; 
?>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>