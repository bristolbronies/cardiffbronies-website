<?php 
	get_template_part("partials/global/html-header");
	get_template_part("partials/global/header");
?>

	<main class="body" id="content" role="main">
		<div class="layout">
			<div class="template-archive__intro">
				<div class="template-archive__header">
					<h1 class="template-archive__title">The Flugelhorn</h1>
				</div>
				<div class="content template-archive__body">
					<p>What's going on in the Bristol Bronies today? Who knows! Make sure you keep up with the little things on <a href="https://twitter.com/bristolbronies">Twitter</a> and <a href="https://facebook.com/bristolbronies">Facebook</a>.</p>
				</div>
			</div>
		</div>
		<div class="article-grid">
			<div class="layout">
				<?php 
					$posts = new WP_Query($query_string . "&posts_per_page=-1");
					$post_count = $posts->found_posts;
					if($posts->have_posts()):
						while($posts->have_posts()): $posts->the_post();
							if(has_post_thumbnail()):
								$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), "full");
								$image_url = $image_url[0];
							else:
								$image_url = false;
							endif;
				?>
					<article class="article-grid__item">
						<header class="article-grid__header">
							Bulletin #<?php
								echo $post_count; 
								$post_count--;
							?>: 
							<time class="article-grid__date" datetime="<?php echo get_the_date("c"); ?>">
								<?php echo get_the_date("jS F Y, g:ia"); ?>
							</time>
							<h1 class="article-grid__title">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h1>
						</header>
					</article>
				<?php 
						endwhile;
					endif;
				?>
			</div>
		</div>
	</main>
<?php
	get_template_part("partials/global/footer");
	get_template_part("partials/global/html-footer");
?>