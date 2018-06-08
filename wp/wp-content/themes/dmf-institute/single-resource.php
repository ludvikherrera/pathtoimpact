<?php
// Header
global $dmf;
get_header();
?>

<main role="main">

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

		<?php if( (isset($_GET['maillist']) AND $_GET['maillist'] == "") AND !isset($_COOKIE['dmf_resource_message'])): ?>
			<section class="resource-notification">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-sm-offset-3">
						<a href="#" id="message-close" class="ss-icon ss-delete"></a>
						<p>Thank you for requesting access to our resources. If you’d like to continue to receive information from use, please subscribe to our newsletter.</p>
					</div>
				</div>
			</section>
		<?php endif; ?>


		<article class="content-block container">
			<a href="/resources" class="back-link" title="">Back to Online Resources</a>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<header class="content-header">
						<h1 class="heading-primary"><?php the_title(); ?></h1>
						<div class="row">
							<div class="col-xs-12 col-sm-7">
								<?php
									$post_categories = get_the_terms( $post->ID, 'resource-category' );
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

						<?php if(!isset($_COOKIE['dmf_resource_view']) OR $_COOKIE['dmf_resource_view']==1): ?>

							<?php the_content(); ?>

						<?php else: ?>

							<?php the_excerpt(); ?>

							<!--Resource Signup-->
							<div class="newsletter-signup">
								<h2 class="heading-secondary">Sign Up To Access This Resource</h2>

								<?php gravity_form( 4, false, false, false, '', false ); ?>

							</div>

						<?php endif; ?>

					</div>
				</div>
			</div>
		</article>

		<?php

			//echo "<pre>";
			//print_r($cats);
			//echo "</pre>";

			$args = array(
				'numberposts' 		=> '3',
				'orderby' 			=> 'post_date',
				'order' 			=> 'DESC',
				'post_status' 		=> 'publish',
				'post_type'			=> 'resource',
				'exclude'			=> $post->ID,
				'tax_query' => array(
					array(
						'taxonomy' => 'resource-category',
						'field' => 'term_id',
						'terms' => $cats,
						'operator' => 'IN'
					),
				)
			);

			$recent_posts = wp_get_recent_posts( $args );
		?>



	<?php endwhile; endif; ?>

</main>



<?php get_footer(); ?>
