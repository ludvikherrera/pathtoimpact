<?php
/* Template Name: Search Page */
// Header
get_header();
?>


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
						<h1 class="page-title">Search</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Article Block-->
	<section class="article-block">
		<div class="container">
			<div class="row">

				<div class="col-xs-12 search-form">

					<form method="get" id="search_form" action="<?php bloginfo('home'); ?>"/>
				       <input type="text" class="text" name="s" placeholder="Search" >
				       <input type="submit" class="btn btn-default blue" value="Go">
					</form>

				</div>

			</div>
		</div>
	</section>


</main>	



<?php get_footer(); ?>
