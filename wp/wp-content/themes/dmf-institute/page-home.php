<?php
/*
Template Name: Home
*/

// Header
get_header();
the_post();
global $dmf;
$home_post = $post->ID;
?>


	<!--Main-->
	<main class="site-content" role="main">

		<!--Hero Block-->
		<div class="hero-block has-overlay">
			<picture>
				<!--[if IE 9]><video style="display: none;"><![endif]-->
				<source srcset="<?php the_field('home_hero_image_desktop'); ?>" media="(min-width: 768px)">
				<!--[if IE 9]></video><![endif]-->
				<img srcset="<?php the_field('home_hero_image_mobile'); ?>" alt="">
			</picture>
			<div class="hero-overlay">
				<div class="container">
					<div class="row no-gutters">
						<div class="col-sm-10 col-md-6 pull-right">
							<div class="overlay-content">
								<span class="heading-primary"><?php the_field('home_hero_title'); ?></span>
								<?php the_field('home_hero_text'); ?>
							</div>
							<a href="<?php the_field('home_hero_link'); ?>" class="btn btn-red arrow-right" title="">Learn more</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Info Block-->
		<section class="info-block">
			<div class="container">
				<div class="eq-height no-gutters row">
					<div class="col-sm-6">
						<div class="block-wrap bg-blue-light">
							<h2 class="heading-primary"><?php the_field('member_title'); ?></h2>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="info-content">
							<div class="info-details eq-height row">
								<div class="col-xs-4 col-sm-4">
									<span class="number lg"><?php the_field('member_stat_1'); ?></span>
									<span class="description"><?php the_field('member_stat_1_title'); ?></span>
								</div>
								<div class="col-xs-4 col-sm-4">
									<span class="number lg"><?php the_field('member_stat_2'); ?></span>
									<span class="description"><?php the_field('member_stat_2_title'); ?></span>
								</div>
								<div class="col-xs-4 col-sm-4">
									<span class="number lg"><?php the_field('member_stat_3'); ?></span>
									<span class="description"><?php the_field('member_stat_3_title'); ?></span>
								</div>
							</div>
							<?php the_field('member_text'); ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!--Info Grid-->
		<section class="info-grid bg-gray">
			<div class="container">
				<div class="grid-img has-overlay">
					<picture>
						<!--[if IE 9]><video style="display: none;"><![endif]-->
						<source srcset="<?php the_field('cta_image_desktop'); ?>" media="(min-width: 768px)">
						<!--[if IE 9]></video><![endif]-->
						<img srcset="<?php the_field('cta_image_mobile'); ?>" alt="">
					</picture>
					<div class="grid-overlay">
						<h2 class="heading-primary"><?php the_field('cta_title'); ?></h2>
						<?php the_field('cta_text'); ?>
					</div>
				</div>
				<div class="colored-grid no-gutters row">

					<?php if( have_rows('info_grid_blocks','options') ): ?>

					 	<?php $x=1; while ( have_rows('info_grid_blocks','options') ) : the_row(); ?>

					        <div class="grid-item grid-<?php echo $x; ?> col-xs-6 col-sm-3">
								<div class="grid-wrap">
									<img src="<?php the_sub_field('block_icon'); ?>" alt="" height="60" width="60">
									<span class="grid-title"><?php the_sub_field('block_text'); ?></span>
								</div>
							</div>

					    <?php $x++; endwhile; ?>

					<?php endif; ?>

					<a href="<?php the_field('cta_link'); ?>" class="btn btn-blue-light btn-top arrow-right" title=""><?php the_field('cta_link_text'); ?></a>
				</div>
			</div>
		</section>

		<!--Testimonial Block-->
		<?php
		    query_posts(array(
		        'post_type' => 'testimonial',
		        'showposts' => 1
		    ) );
		?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="testimonial-block container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<blockquote>
							<p>"<?php echo get_the_content(); ?>"</p>
							<img src="<?php the_field('photo', $post->ID); ?>" alt="" height="150" width="150">
							<footer><?php the_field('name', $post->ID); ?>, <?php the_field('title', $post->ID); ?></footer>
						</blockquote>
                        <a href="/member-testimonials" class="info-link arrow-right red" title="">See All Testimonials</a>
					</div>
				</div>
			</div>
		<?php endwhile; ?>

		<?php wp_reset_query(); ?>


		<?php if(get_field('featured_event')): ?>

			<!--Info Block-->
			<section class="info-block">
				<div class="container">
					<div class="eq-height no-gutters row">
						<div class="col-md-4 col-lg-6">
							<div class="block-wrap bg-blue-light">
								<h2 class="heading-primary">Upcoming<br> Events</h2>
							</div>
						</div>
						<div class="col-md-8 col-lg-6">
							<picture>
								<!--[if IE 9]><video style="display: none;"><![endif]-->
								<source srcset="/assets/img/placeholders/info-2.jpg" media="(min-width: 768px)">
								<!--[if IE 9]></video><![endif]-->
								<img srcset="/assets/img/placeholders/info-2-sm.jpg" alt="">
							</picture>
							<div class="info-content info-overlay">
								<?php
									$event = get_post( get_field('featured_event') ); 
		
								?>
								<span class="title-primary"><?php the_field('start_date', $event->ID); ?></span>
								<h3 class="heading-secondary"><?php echo $event->post_title;; ?></h3>
								<?php echo $dmf->custom_content(25, false, $event->post_content); ?>
								<div class="btn-group">
									<a href="<?php echo get_permalink($event->ID); ?>" class="info-link arrow-right blue" title="">Learn More And Register</a>
									<a href="/events" class="info-link arrow-right blue" title="">See All Events</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php endif; ?>

		<!--Article Block-->
		<section class="article-block">
			<div class="container">
				<div class="article-heading row">
					<div class="col-sm-6">
						<h2 class="heading-secondary">From the Blog</h2>
					</div>
					<div class="col-sm-6">
						<a href="/blog" class="more-btn" title="">More Blogs</a>
					</div>
				</div>
				<div class="eq-height row">
					<?php
						$args = array(
							'numberposts' 		=> '3',
							'orderby' 			=> 'post_date',
							'order' 			=> 'DESC',
							'post_status' 		=> 'publish'
						);

						$recent_posts = wp_get_recent_posts( $args );
					?>

					<?php foreach( $recent_posts as $recent ) : ?>

						<section class="article-item col-sm-12 col-md-4">
							<a href="<?php echo get_permalink($recent["ID"]); ?>" class="article-item-wrap" title="">
								<figure>
									<?php
										$primary_cat = new WPSEO_Primary_Term( 'category', $recent["ID"] );
										$primary_cat = $primary_cat->get_primary_term();
										$cat = get_category( $primary_cat );

    								?>
									<span class="article-category <?php echo get_field('category_color', 'term_'.$primary_cat); ?>">
										<?php echo $cat->name; ?>
									</span>

									<?php if(get_field('featured_post_image', $recent["ID"])): ?>
										<img src="<?php the_field('featured_post_image', $recent["ID"]); ?>" alt="" height="241" width="385">
									<?php else: ?>
										<img src="/assets/img/blank.jpg" alt="" height="241" width="385">
									<?php endif; ?>
								</figure>
								<div class="article-content">
									<span class="title-primary"><?php echo get_the_date('M j, Y', $recent["ID"]); ?></span>
									<h3 class="heading-tertiary"><?php echo $recent["post_title"]; ?></h3>
									<?php echo $dmf->custom_content(25, false, $recent['post_content']); ?>
									<span class="link-more arrow-right red" title="">Read Article</span>
								</div>
							</a>
						</section>
					<?php endforeach; ?>

				</div>
			</div>
		</section>

	</main>


<?php get_footer(); ?>