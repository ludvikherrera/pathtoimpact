<?php
// Header
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
	
</main>

<?php get_footer(); ?>
