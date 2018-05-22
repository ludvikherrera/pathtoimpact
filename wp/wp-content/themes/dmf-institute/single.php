<?php
// Header
global $dmf;
get_header();
?>

<main role="main">

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

		<article class="content-block container">
			<a href="/blog" class="back-link" title="">Back to Blog</a>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<header class="content-header">
						<h1 class="heading-primary"><?php the_title(); ?></h1>
						<div class="row">
							<div class="col-xs-12 col-sm-7">
								<?php
									$post_categories = wp_get_post_categories( $post->ID );
									$cats = array();

								?>
								<?php foreach($post_categories as $c) : ?>
								    <?php
								    	$cat = get_category( $c );
								    	array_push($cats, $cat->term_id);
								    	//$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
								    ?>
								    <span class="article-category <?php echo get_field('category_color', 'term_'.$cat->term_id); ?>"><?php echo $cat->name; ?></span>
								<?php endforeach; ?>


								<span class="article-date"><?php the_date('M j, Y'); ?></span>
							</div>
							<div class="col-xs-12 col-sm-5 text-right">
								<!-- Facebook -->
								<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
								<!-- Twitter -->
								<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
								<!-- LinkedIn -->
								<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
								<script type="IN/Share" data-url="<?php the_permalink(); ?>"></script>
							</div>

						</div>
					</header>
					<div class="main-content">
						<?php if(get_field('featured_post_image')): ?>
							<img src="<?php the_field('featured_post_image'); ?>" />
						<?php endif; ?>

						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</article>

		<!--Article Block-->
		<section class="article-block">
			<div class="container">

				<!--Info Grid-->
				<?php get_template_part('parts/info_grid'); ?>

				<div class="article-heading row">
					<div class="col-sm-6">
						<h2 class="heading-secondary">More Content</h2>
					</div>
					<div class="col-sm-6">

					</div>
				</div>

				<!--Lower Section-->
				<div class="eq-height row">

					<?php

						//echo "<pre>";
						//print_r($cats);
						//echo "</pre>";

						$args = array(
							'numberposts' 		=> '3',
							'orderby' 			=> 'post_date',
							'order' 			=> 'DESC',
							'post_status' 		=> 'publish',
							'category'			=> $cats,
							'exclude'			=> $post->ID
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

	<?php endwhile; endif; ?>

</main>



<?php get_footer(); ?>
