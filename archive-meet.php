<?php 
	get_template_part("partials/global/html-header");
	get_template_part("partials/global/header");
	$current_page = max(1, get_query_var("paged"));
	$posts_per_page = 18;
	$post_count = new WP_Query($query_string . "&posts_per_page=-1");
	$post_count = $post_count->found_posts;
	$post_counter = ($post_count - (($current_page - 1) * $posts_per_page));
?>

	<main class="body" id="content" role="main">
		<div class="layout">
			<div class="template-archive__intro">
				<div class="template-archive__header">
					<h1 class="template-archive__title">Meets</h1>
				</div>
				<div class="content template-archive__body">
					<p>Happening every week since July 2012, we had more meets than any brony group anywhere in the world (probably).</p>
				</div>
			</div>
		</div>
		<div class="meet-grid meet-grid--list-3">
			<div class="layout">
				<?php 
					$posts = new WP_Query($query_string . "&meta_key=meet_start_time&orderby=meta_value_num&order=DESC&posts_per_page=" . $posts_per_page);
					if($posts->have_posts()):
						while($posts->have_posts()): $posts->the_post();
							if(has_post_thumbnail()):
								$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), "full");
								$image_url = $image_url[0];
							else:
								$image_url = false;
							endif;
				?>
					<article class="meet-grid__item" style="background-color: <?php echo bb_generate_colour(get_the_title()); ?>">
						<a class="meet-grid__link" href="<?php the_permalink(); ?>">
							<?php if($image_url): ?>
								<div class="meet-grid__image">
									<picture>
										<img srcset="<?php echo $image_url; ?>" alt="">
									</picture>
								</div>
							<?php endif; ?>
							<div class="meet-grid__body">
								<span class="meet-grid__number">#<?php echo $post_counter; $post_counter--; ?></span>
								<h1 class="meet-grid__title"><?php the_title(); ?></h1>
								<span class="meet-grid__date"><?php echo bb_meet_dates(bb_custom_field('meet_start_time')); ?></span>
							</div>
						</a>
					</article>
					<?php /*
						$categories = bb_meet_category(get_the_ID());
						for($i = 0; $i < count($categories); $i++):
							echo $categories[$i];
							if(!empty($categories[$i+1])): echo " / "; endif;
						endfor;
					?><br>
					<?php echo bb_meet_dates(bb_custom_field("meet_start_time"), bb_custom_field("meet_end_time")); ?><br>
					<?php echo bb_meet_location(get_field("meet_location")); */ ?>
				<?php 
						endwhile;
					endif;
				?>
			</div>
		</div>
		<ul class="pagination">
			<li class="pagination__item pagination__item--text">Meet <span class="pagination__no">N<span>o</span></span>:</li>
			<?php 
				$iteration = 0;
				for($i = $posts->max_num_pages; $i > 0; $i--):
					$number_start = $post_count - ($posts_per_page * $iteration);
					$number_end = ($number_start - $posts_per_page + 1) > 1 ? ($number_start - $posts_per_page + 1) : 1;
			?>
			<li class="pagination__item">
				<a href="?paged=<?php echo $iteration + 1; ?>" class="pagination__link<?php if($iteration + 1 == $current_page) { echo ' pagination__link--current'; } ?>">#<?php echo $number_start; ?>&ndash;<?php echo $number_end; ?></a>
			</li>
			<?php 
					$iteration++;
				endfor;
				// print_r($posts->max_num_pages);
			?>
		</ul>
	</main>
<?php
	get_template_part("partials/global/footer");
	get_template_part("partials/global/html-footer");
?>