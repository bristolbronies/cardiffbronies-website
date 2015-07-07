<?php
	/*
		Template Name: Single - Meet
	*/
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
?>

	<main class="body" id="content" role="main">
		<div class="layout">
			<?php 
				if(have_posts()):
					while(have_posts()): 
						the_post(); 
			?>
			<article class="article article--meet">
				<header class="article__header">
					<h1 class="article__title"><?php the_title(); ?></h1>
					<ul class="metadata article__meta">
						<?php 
							$runners = get_field('meet_runner'); 
							$runners_count = count($runners);
							$runners_grid = ($runners_count > 4) ? 4 : $runners_count;
						?>
						<li class="metadata__item">
							<div class="avatar-grid avatar-grid--items-<?php echo $runners_grid; ?> metadata__image">
								<?php 
									for($i = 0; $i < $runners_grid; $i++):
								?>
										<img class="avatar-grid__item" alt="<?php echo get_the_title($runners[$i]); ?>" src="<?php echo bb_profile_avatar($runners[$i]); ?>">
								<?php 
									endfor;
								?>
							</div>
							<strong class="metadata__title">
								<?php 
									if($runners_count == 1):
										echo 'Meet runner';
									else:
										echo 'Meet runners';
									endif;
								?>
							</strong>
							<span class="metadata__value">
								<?php 
									for($i = 0; $i < $runners_count; $i++):
										echo get_the_title($runners[$i]);
										if(!empty($runners[$i+1])):
											echo ", ";
										endif;
									endfor;
								?>
							</span>
						</li>
						<li class="metadata__item">
							<strong class="metadata__title">Running time</strong>
							<span class="metadata__value"><?php echo bb_meet_dates(bb_custom_field('meet_start_time'), bb_custom_field('meet_end_time')); ?></span>
						</li>
						<li class="metadata__item">
							<strong class="metadata__title">Location</strong>
							<span class="metadata__value">
								<?php echo bb_meet_location(get_field('meet_location'), "name"); ?>
								(<a href="https://www.google.co.uk/maps/search/<?php echo urlencode(bb_meet_location(get_field('meet_location'), "address")); ?>">map</a>)
							</span>
						</li>
						<?php 
							if(bb_custom_field('meet_end_time') > time()): 
						?>
						<li class="metadata__item">
							<strong class="metadata__title">Forecast</strong>
							<span class="metadata__value">High: 21&deg; Low: 16&deg;</span>
						</li>
						<?php 
							endif; 
						?>
					</ul>
				</header>
				<div class="content article__body">
					<?php 
						if(has_post_thumbnail()):
							$image_url[0] = wp_get_attachment_image_src(get_post_thumbnail_id(), "article-small")[0];
							$image_url[1] = wp_get_attachment_image_src(get_post_thumbnail_id(), "article-medium")[0];
							$image_url[2] = wp_get_attachment_image_src(get_post_thumbnail_id(), "article-large")[0];
					?>
					<div class="article__media article__media--none">
						<picture>
							<!--[if IE 9]><video style="display:none;"><[endif]-->
							<source srcset="<?php echo $image_url[0]; ?>" media="(min-width: 0px)">
							<source srcset="<?php echo $image_url[1]; ?>" media="(min-width: 600px)">
							<source srcset="<?php echo $image_url[2]; ?>" media="(min-width: 1024px)">
							<!--[if IE 9]></video><![endif]-->
							<img srcset="<?php echo $image_url[2] ?>" alt="">
						</picture>
					</div>
					<?php
						endif;
					?>
					<?php 
						if(strlen(get_the_content()) > 0):
							the_content(); 
						else:
							echo '<p><em>No meet plans announced.</em></p>';
						endif;
					?>
				</div>
			</article>
			<script type="application/ld+json">
				{
					"@context": "http://schema.org",
					"@type": "Event",
					"name": "<?php the_title(); ?>",
					"description": "<?php echo bb_json_sanitiser(get_the_excerpt()); ?>",
<?php if(!empty($image_url[2])): ?>					"image": "<?php echo $image_url[2]; ?>",<?php endif; ?>
					"startDate": "<?php echo date('c', bb_custom_field('meet_start_time')); ?>",
					"endDate": "<?php echo date('c', bb_custom_field('meet_end_time')); ?>",
					"url": "<?php the_permalink(); ?>",
					"location": {
						"@type": "Place",
						"name": "<?php echo bb_meet_location(get_field('meet_location'), 'name'); ?>",
						"address": "<?php echo bb_meet_location(get_field('meet_location'), 'address'); ?>"
						"geo": {
							"@type": "GeoCoordinates",
							"latitude": "<?php echo bb_meet_location(get_field('meet_location'), 'latitude'); ?>",
							"longitude": "<?php echo bb_meet_location(get_field('meet_location'), 'longitude'); ?>"
						}
					},
					"organizer": [
						{
							"@type": "Organization",
							"name": "<?php bloginfo('sitename'); ?>",
							"logo": "",
							"url": "<?php bloginfo('url'); ?>",
							"email": "hello@bristolbronies.co.uk"
						}<?php 
							foreach($runners as $runner): 
						?>,
						{
							"@type": "Person",
							"name": "<?php echo get_the_title($runner); ?>",
							"description": "<?php echo bb_json_sanitiser(bb_profile_biography($runner)); ?>",
							"image": "<?php echo bb_profile_avatar($runner); ?>",
							"sameAs": [
							]
						}<?php 
							endforeach; 
						?>
					]
				}
			</script>
			<?php 
					endwhile;
				endif;
			?>
		</div>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>