<?php
// Header
/* Template Name: Assessment */
get_header();
?>

<main role="main">



	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

		<?php if(get_field('header_image')): ?>
			<div class="hero-block">
				<picture>
					<!--[if IE 9]><video style="display: none;"><![endif]-->
					<source srcset="<?php the_field('header_image'); ?>" media="(min-width: 768px)">
					<!--[if IE 9]></video><![endif]-->
					<img srcset="<?php the_field('header_image_mobile'); ?>" alt="">
				</picture>
				<div class="hero-overlay hero-sm">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h1 class="page-title"><?php the_title(); ?></h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<article class="content-block container">
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<?php if(!get_field('header_image')): ?>
						<header class="content-header">
							<h1 class="heading-primary"><?php the_title(); ?></h1>
						</header>
					<?php endif; ?>
					<div class="main-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</article>

	<?php endwhile; endif; ?>

	<!-- START Nu Block -->
	<section class="nu-block discover-memb">
					<div class="container">
							<div class="grid-img">
									<picture>
					<!--[if IE 9]><video style="display: none;"><![endif]-->
					<!-- <source srcset="http://www.pathtoimpact.org/wp/wp-content/uploads/2017/02/info-1.jpg" media="(min-width: 768px)"> -->
					<!--[if IE 9]></video><![endif]-->
					<img srcset="/assets/img/dash_pattern_t.png" alt="">
				</picture>
						 </div>
							<div class="eq-height no-gutters row">
									<div class="col-lg-12">
					<h2 class="heading-primary hlt-title">Discover the many benefits of membership</h2>
				</div>
							</div>
									<!-- <div class="deco no-gutters row fullwidth"> -->
									<div class="eq-height no-gutters row">
											<div class="col-sm-12 col-md-6 col-md-offset-6">
													<a href="/become-a-member" class="btn btn-blue-light btn-top arrow-right" title="">Learn More</a>
											</div>
									</div>
					</div>
	</section>
	<!-- END Nu Block -->

</main>

<?php get_footer(); ?>
