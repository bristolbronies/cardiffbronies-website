<?php 
	$billboards = new WP_Query('post_type=billboard&orderby=date&order=DESC&posts_per_page=2');
	if($billboards->have_posts()):
		while($billboards->have_posts()): $billboards->the_post();
			$image_url = get_field("billboard_image"); 
?>
			<aside class="billboard">
				<a class="billboard__link" href="<?php echo get_field("billboard_url"); ?>">
					<div class="billboard__body">
						<img class="billboard__image" alt="" src="<?php echo $image_url['url']; ?>">
						<h1 class="billboard__title"><?php the_title(); ?></h1>
						<div class="content billboard__content">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</a>
			</aside>
<?php 
		endwhile;
	endif;
	wp_reset_postdata();
?>