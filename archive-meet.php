<?php 
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
?>

	<main class="body" id="content" role="main">
		<div class="layout">
			<div class="template-archive__intro">
				<div class="template-archive__header">
					<h1 class="template-archive__title">Meets</h1>
				</div>
				<div class="content template-archive__body">
					<p>Happening every week since July 2012, we hold the most events of any brony group anywhere in the world (probably).</p>
				</div>
			</div>
			<?php 
				$posts = new WP_Query($query_string . '&meta_key=meet_start_time&orderby=meta_value_num&order=DESC');
				if($posts->have_posts()):
					while($posts->have_posts()): $posts->the_post();
			?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
			<?php 
					endwhile;
				endif;
			?>
			<?php 
				$big = 9999999;
				echo paginate_links(array(
					'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
					'format' => '?paged=%#%',
					'current' => max(1, get_query_var('paged')),
					'total' => $wp_query->max_num_pages,
					'prev_next' => false,
					'type' => 'list',
					'end_size' => 0,
					'mid_size' => 100
				));
			?>
		</div>
	</main>
<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>