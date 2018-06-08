<?php
/**
 * The template for displaying search results pages.
 */

global $dmf;

get_header(); ?>

<main class="site-content" role="main">
	<div class="hero-block">
		<picture>
			<!--[if IE 9]><video style="display: none;"><![endif]-->
			<source srcset="<?php the_field('blog_image_desktop', 'options'); ?>" media="(min-width: 768px)">
			<!--[if IE 9]></video><![endif]-->
			<img srcset="<?php the_field('blog_image_mobile', 'options'); ?>" alt="">
		</picture>
		<div class="hero-overlay hero-sm">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title">Search Results</h1>
						<div class="search-for">
							<?php printf( __( 'for <em>"%s"</em> ' ), get_search_query() ); ?>
							<?php if($_GET['searchtype'] == "resource"): ?>
								in Resources
							<?php endif; ?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<?php if($_GET['searchtype'] == "resource"): ?>

		<section class="resources-block container">
			<div class="resources-content row">

				<div class="col-sm-12">

					<?php $y=1; if(have_posts()) : while(have_posts()) : the_post(); ?>


						<?php if(get_post_type( $post->ID ) == 'resource'): ?>
							<div class="resource-item media">
								<a href="<?php echo get_permalink($post->ID); ?>" class="item-wrap" title="">
									<div class="media-left">
										<img src="/assets/img/placeholders/resource-thumb-1.svg" alt="" height="55" width="66">
		
									</div>
									<div class="media-body">
										<h3><?php echo the_title(); ?></h3>
										<?php echo $dmf->custom_content(25, false, get_the_content()); ?>
										<span class="link-more arrow-right red" title="">View Resource</span>
									</div>
								</a>
								<?php
									$primary_cat = new WPSEO_Primary_Term( 'resource-category', $post->ID );
									$primary_cat = $primary_cat->get_primary_term();
									$cat = get_category( $primary_cat );

								?>
								<span class="article-category <?php echo get_field('category_color', 'term_'.$primary_cat); ?>"><?php echo $cat->name; ?></span>
							</div>
						<?php endif; ?>

				<?php $y++; endwhile; endif; ?>

				</div>

			</div>
		</section>


	<?php else: ?>

		<!--Article Block-->
		<section class="article-block">
			<div class="container">

				<div class="eq-height row">
					
					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<section class="article-item col-sm-12">
								<a href="<?php echo get_permalink($post->ID); ?>" class="article-item-wrap" title="">
									<figure class="col-md-4">

										<span class="article-category blue">
											<?php
												$type = get_post_type($post->ID);
												if($type == "post") {
													echo "Blog";
												}
												else {	
													echo $type;
												}
											?>
										</span>
										<?php if(get_field('featured_post_image', $post->ID)): ?>
											<img src="<?php the_field('featured_post_image', $post->ID); ?>" alt="">
										<?php else: ?>
											<img src="/assets/img/blank.jpg" alt="">
										<?php endif; ?>
									</figure>
									<div class="article-content col-md-8">
										
										<h3 class="heading-tertiary"><?php echo the_title(); ?></h3>
										<?php 
											// about page with acf fields
											if($post->ID == 29) {
												$main_intro = get_field('content_blocks', $post->ID);
												echo $dmf->custom_content(25, false, $main_intro[0]['text']);
											}
											else {
												echo $dmf->custom_content(25, false, get_the_content()); 
											}
										?>
										<span class="link-more arrow-right" title="">Read More</span>
									</div>
								</a>
							</section>

						<?php endwhile; ?>

					<?php else : ?>
						<div class="text-center search-title">
							<h2>There were no results found for <em>"<?php printf( __( '%s' ), get_search_query() ); ?>"</em>.</h2>
							Please try your search again.
							<br /><br />
						</div>

					<?php endif; ?>
						

			
				</div>

			</div>
		</section>

	<?php endif; ?>

</main>



<?php get_footer(); ?>
