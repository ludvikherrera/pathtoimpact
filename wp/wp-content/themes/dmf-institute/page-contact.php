<?php
// Header
/* Template Name: Contact */
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

			<article class="content-block container contact">
				<div class="row">
					<h2 class="heading-primary hlt-title">We'd Love to Hear From You!</h2>
					<div class="col-md-5 col-lg-6 contact-left-col">
						<img srcset="http://www.pathtoimpact.org/wp/wp-content/uploads/2018/06/building-img.jpg" alt="">
						<div id="" class="vcard">

							<div class="org">Impact Foundation</div>
							<div class="adr">
								<div class="street-address">4141 28th Ave S</div>
								<span class="locality">Fargo</span>
								,
								<span class="region">ND</span>
								,
								<span class="postal-code">58104</span>

							</div>
							<a class="email" href="mailto:info@impactfdn.org"><span class="ss-mail"></span> info@impactfdn.org</a>
							<div class="tel"><span class="ss-phone"></span> 701 356 2668</div>
						</div>
					</div>

						<div class="col-md-7 col-lg-6">
							<div class="main-content">
								<?php the_content(); ?>
							</div>
						</div>

				</div>
			</article>

		<?php endwhile; endif; ?>

	</main>

	<?php get_footer(); ?>
