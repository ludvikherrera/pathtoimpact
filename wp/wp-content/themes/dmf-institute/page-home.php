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
		<div class="hero-block">
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
		<section class="info-block stats-block">
			<div class="container">
				<div class="eq-height no-gutters row">
					<div class="col-md-5 col-sm-6 col-md-offset-1">
						<!--<div class="block-wrap bg-blue-light">-->
							<h2 class="heading-alternate"><?php the_field('member_title'); ?></h2>
						<!--</div>-->
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="info-content">
							<div class="info-details eq-height row">
								<div class="col-xs-4 col-sm-4">
									<span>
									    <svg version="1.1"
                                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                             x="0px" y="0px" width="30" height="30" viewBox="0 0 30 30" enable-background="new 0 0 30 30"
                                             xml:space="preserve" style="fill:#41B6E6;transform: scale(2)"><defs></defs>
                                        <circle cx="14.3" cy="4.5" r="4.5"/><path d="M24.2,8.9c-2.5,0-4.5-2-4.5-4.5s2-4.5,4.5-4.5s4.5,2,4.5,4.5S26.7,8.9,24.2,8.9z M24.2,1.3c-1.7,0-3.1,1.4-3.1,3.1s1.4,3.1,3.1,3.1s3.1-1.4,3.1-3.1S25.9,1.3,24.2,1.3z"/><circle cx="4.5" cy="14" r="4.5"/><path d="M14.3,18.4c-2.5,0-4.5-2-4.5-4.5s2-4.5,4.5-4.5s4.5,2,4.5,4.5S16.8,18.4,14.3,18.4z M14.3,10.8c-1.7,0-3.1,1.4-3.1,3.1s1.4,3.1,3.1,3.1s3.1-1.4,3.1-3.1S16.1,10.8,14.3,10.8z"/><circle cx="24.2" cy="14" r="4.5"/><circle cx="4.5" cy="23.5" r="4.5"/><path d="M14.3,27.9c-2.5,0-4.5-2-4.5-4.5s2-4.5,4.5-4.5s4.5,2,4.5,4.5S16.8,27.9,14.3,27.9z M14.3,20.3c-1.7,0-3.1,1.4-3.1,3.1s1.4,3.1,3.1,3.1s3.1-1.4,3.1-3.1S16.1,20.3,14.3,20.3z"/></svg>
									</span>
									<span class="number lg"><?php the_field('member_stat_1'); ?></span>
									<span class="description"><?php the_field('member_stat_1_title'); ?></span>
								</div>
								<div class="col-xs-4 col-sm-4">
                                <span><svg version="1.1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                     x="0px" y="0px" width="28px" height="25.8px" viewBox="0 0 28 25.8" enable-background="new 0 0 28 25.8" xml:space="preserve" style="fill:#41B6E6;transform: scale(2)"><defs></defs><g id="hand_ghd">
                                    <path id="hand_2_" d="M27.4,16.6C27.4,16.6,27.4,16.6,27.4,16.6l-3.6,0l-0.2-0.3c-0.4-0.7-1-1.4-1.6-1.9c-0.1,0-1.5-1.1-2.8-1.1h-7.8c-0.4,0-0.7,0.3-0.7,0.7c0,0.1,0,0.2,0.1,0.3c1.6,3.2,3.3,3.4,5.3,3.4h0.8C16.6,18.3,16,19,14.6,19h-0.8
                                        c-1-0.1-1.9-0.4-2.7-0.9c-1-0.8-2.2-1.8-3.5-2.8C6.8,14.7,6,14,5.3,13.5c-2.2-1.8-4.3-0.7-5.1,0c-0.3,0.3-0.3,0.7,0,1c0,0,0,0,0,0l9.7,9.7c1,1,4,1.5,4.6,1.6h0.1h12.8c0.4,0,0.7-0.3,0.7-0.7v-7.9C28,16.9,27.8,16.6,27.4,16.6z M22.7,24.4h-8c-1.3-0.2-3.2-0.7-3.7-1.2h0l-9.2-9.1c0.6-0.3,1.5-0.4,2.7,0.4c0.7,0.6,1.5,1.2,2.4,1.9c1.2,1,2.5,2,3.5,2.8c1.1,0.7,2.3,1.1,3.6,1.2h0.8c2.8,0,3.7-2.2,3.8-3.4c0-0.4-0.3-0.7-0.6-0.7c0,0,0,0,0,0H16c-1.4,0-2.4-0.1-3.4-1.6h6.6c0.8,0,1.7,0.6,2,0.8c0.5,0.4,1,0.9,1.3,1.5c0.1,0.1,0.2,0.3,0.3,0.5V24.4z M24.1,24.4v-6.5h2.5l0,6.5H24.1z"/></g><g id="heart_ghd"><path d="M11.5,0C10.2,0,9,0.6,8.2,1.5C7.4,0.6,6.2,0,4.9,0C2.6,0,0.7,1.9,0.7,4.2c0,0.8,0.2,1.6,0.7,2.3c1,1.8,5.5,5.7,6.5,6.2c0.2,0.1,0.4,0.1,0.6,0C9.6,12.2,14,8.3,15,6.5c0.4-0.7,0.7-1.5,0.7-2.3C15.7,1.9,13.8,0,11.5,0z M13.9,5.9L13.9,5.9c-0.9,1.5-4.5,4.6-5.7,5.5c-1.2-0.8-4.8-4-5.7-5.5C2.2,5.4,2,4.8,2,4.2c0-1.6,1.3-2.9,2.9-2.9C6.1,1.3,7.1,2,7.6,3c0.2,0.3,0.6,0.5,0.9,0.3C8.6,3.2,8.7,3.1,8.8,3c0.5-1,1.6-1.7,2.7-1.7c1.6,0,2.9,1.3,2.9,2.9C14.4,4.8,14.2,5.4,13.9,5.9z"/></g></svg>
                                </span>
									<span class="number lg"><?php the_field('member_stat_2'); ?></span>
									<span class="description"><?php the_field('member_stat_2_title'); ?></span>
								</div>
								<div class="col-xs-4 col-sm-4">
                                    <span><svg version="1.1"
                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                         x="0px" y="0px" width="28px" height="25.9px" viewBox="0 0 28 25.9" enable-background="new 0 0 28 25.9" xml:space="preserve" style="fill:#41B6E6;transform: scale(2)"><defs></defs><g><path id="heart_3_" d="M16.7,20.9c0.1,0.1,0.2,0.1,0.4,0c0.7-0.3,3.4-2.7,4-3.8c0.3-0.4,0.4-0.9,0.4-1.4c0-1.4-1.2-2.6-2.6-2.6c-0.8,0-1.5,0.4-2,0.9c-0.5-0.6-1.2-0.9-2-0.9c-1.4,0-2.6,1.2-2.6,2.6c0,0.5,0.2,1,0.4,1.4C13.4,18.2,16.1,20.6,16.7,20.9z"/><path id="heart_2_" d="M23.6,25.9c0.1,0,0.2,0,0.3,0c0.5-0.2,2.5-2,3-2.8c0.2-0.3,0.3-0.7,0.3-1.1c0-1.1-0.9-1.9-1.9-1.9c-0.6,0-1.1,0.3-1.5,0.7c-0.4-0.4-0.9-0.7-1.5-0.7c-1.1,0-1.9,0.9-1.9,1.9c0,0.4,0.1,0.7,0.3,1.1C21.1,23.9,23.1,25.7,23.6,25.9z"/><path id="heart_1_" d="M11.2,24.9c0.1,0,0.2,0,0.2,0c0.4-0.2,2.1-1.7,2.5-2.4c0.2-0.3,0.3-0.6,0.3-0.9c0-0.9-0.7-1.6-1.6-1.6c-0.5,0-0.9,0.2-1.3,0.6c-0.3-0.4-0.8-0.6-1.3-0.6c-0.9,0-1.6,0.7-1.6,1.6c0,0.3,0.1,0.6,0.3,0.9C9.1,23.2,10.8,24.7,11.2,24.9z"/><path id="hand_1_" d="M0.7,9.3C0.7,9.3,0.7,9.3,0.7,9.3l3.6,0l0.2,0.3c0.4,0.7,1,1.4,1.6,1.9c0.1,0,1.5,1.1,2.8,1.1h7.8
                                            c0.4,0,0.7-0.3,0.7-0.7c0-0.1,0-0.2-0.1-0.3C15.7,8.3,14,8.1,12,8.1h-0.8c0.2-0.6,0.8-1.3,2.2-1.3h0.8c1,0.1,1.9,0.4,2.7,0.9c1,0.8,2.2,1.8,3.5,2.8c0.8,0.7,1.7,1.4,2.4,1.9c2.2,1.8,4.3,0.7,5.1,0c0.3-0.3,0.3-0.7,0-1c0,0,0,0,0,0l-9.7-9.7c-1-1-4-1.5-4.6-1.6h-0.1H0.7C0.3,0,0,0.3,0,0.7v7.9C0,8.9,0.3,9.2,0.7,9.3z M5.3,1.4h8c1.3,0.2,3.2,0.7,3.7,1.2h0l9.2,9.1
                                            c-0.6,0.3-1.5,0.4-2.7-0.4c-0.7-0.6-1.5-1.2-2.4-1.9c-1.2-1-2.5-2-3.5-2.8c-1.1-0.7-2.3-1.1-3.6-1.2h-0.8c-2.8,0-3.7,2.2-3.8,3.4c0,0.4,0.3,0.7,0.6,0.7c0,0,0,0,0,0H12c1.4,0,2.4,0.1,3.4,1.6H8.9c-0.8,0-1.7-0.6-2-0.8c-0.5-0.4-1-0.9-1.3-1.5C5.5,8.7,5.4,8.5,5.3,8.4V1.4z M3.9,1.4v6.5H1.4l0-6.5H3.9z"/></g></svg>
                                    </span>
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
		<section class="nu-block exp-results">
			<div class="container">
				<div class="grid-img">
					<picture>
						<!--[if IE 9]><video style="display: none;"><![endif]-->
						<source srcset="<?php the_field('cta_image_desktop'); ?>" media="(min-width: 768px)">
						<!--[if IE 9]></video><![endif]-->
						<img srcset="<?php the_field('cta_image_mobile'); ?>" alt="">
					</picture>
                </div>
					<div class="eq-height no-gutters row">
					    <div class="col-md-offset-6 col-md-6">
						<h2 class="heading-primary hlt-title"><?php the_field('cta_title'); ?></h2>
						<?php the_field('cta_text'); ?>
                        </div>
					</div>
				<div class="colored-grid no-gutters row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
					<?php if( have_rows('info_grid_blocks','options') ): ?>

					 	<?php $x=1; while ( have_rows('info_grid_blocks','options') ) : the_row(); ?>

					        <div class="grid-item grid-<?php echo $x; ?> col-xs-6 col-sm-3">
								<div class="grid-wrap circ">
									<span class="grid-title"><?php the_sub_field('block_text'); ?></span>
								</div>
							</div>

					    <?php $x++; endwhile; ?>

					<?php endif; ?>
                    </div>
                    </div>
                    <div class="deco no-gutters row fullwidth">
                        <div class="col-sm-12 col-md-6 col-md-offset-6">
					<a href="<?php the_field('cta_link'); ?>" class="btn btn-blue-light btn-top arrow-right" title=""><?php the_field('cta_link_text'); ?></a>
                        </div>
			        </div>
                </div>
		</section>

		<!-- START Nu Block -->
		<section class="nu-block exp_resources">
            <div class="container">
                <div class="grid-img">
                    <picture>
						<!--[if IE 9]><video style="display: none;"><![endif]-->
						<!-- <source srcset="http://www.pathtoimpact.org/wp/wp-content/uploads/2017/02/info-1.jpg" media="(min-width: 768px)"> -->
						<!--[if IE 9]></video><![endif]-->
						<img srcset="/assets/img/bckgd_resources.jpg" alt="">
					</picture>
               </div>
                <div class="eq-height no-gutters row">
                    <div class="col-md-6">
						<h2 class="heading-primary hlt-title">Explore Our Resources</h2>
						<p>Put resources at your fingertips to increase your organization’s fundraising success.</p>
                        <p>Become a member today and start unleashing more of your team’s potential to impact those you serve.</p>
					</div>
                </div>
                <div class="colored-grid no-gutters row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 list-plus">
					        <div class="grid-item grid-1 col-xs-6 list-plus-item">
									<span class="grid-title"><a href="https://resources.pathtoimpact.org/collections/articles"><svg version="1.1"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
	 x="0px" y="0px" width="29.7px" height="29.7px" viewBox="0 0 29.7 29.7" enable-background="new 0 0 29.7 29.7"
	 xml:space="preserve"><g id="plusy"><g id="plusy" transform="translate(-0.002 -0.002)"><path id="Path_534_1_" fill="#FAE100" d="M24.8,9.9h-5V5c0-2.7-2.2-5-5-5c-2.7,0-5,2.2-5,5c0,0,0,0,0,0v5H5c-2.7,0-5,2.2-5,5
			s2.2,5,5,5h5v5c0,2.7,2.2,5,5,5s5-2.2,5-5v-5h5c2.7,0,5-2.2,5-5C29.7,12.1,27.5,9.9,24.8,9.9"/></g></g></svg>Articles</a></span>
							</div>
					        <div class="grid-item grid-2 col-xs-6 list-plus-item">
									<span class="grid-title"><a href="https://resources.pathtoimpact.org/collections/courses-and-webinars"><svg version="1.1"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
	 x="0px" y="0px" width="29.7px" height="29.7px" viewBox="0 0 29.7 29.7" enable-background="new 0 0 29.7 29.7"
	 xml:space="preserve"><g id="plusy"><g id="plusy" transform="translate(-0.002 -0.002)"><path id="Path_534_1_" fill="#FAE100" d="M24.8,9.9h-5V5c0-2.7-2.2-5-5-5c-2.7,0-5,2.2-5,5c0,0,0,0,0,0v5H5c-2.7,0-5,2.2-5,5
			s2.2,5,5,5h5v5c0,2.7,2.2,5,5,5s5-2.2,5-5v-5h5c2.7,0,5-2.2,5-5C29.7,12.1,27.5,9.9,24.8,9.9"/></g></g></svg>E-Courses</a></span>
							</div>
					        <div class="grid-item grid-3 col-xs-6 list-plus-item">
									<span class="grid-title"><a href="https://resources.pathtoimpact.org"><svg version="1.1"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
	 x="0px" y="0px" width="29.7px" height="29.7px" viewBox="0 0 29.7 29.7" enable-background="new 0 0 29.7 29.7"
	 xml:space="preserve"><g id="plusy"><g id="plusy" transform="translate(-0.002 -0.002)"><path id="Path_534_1_" fill="#FAE100" d="M24.8,9.9h-5V5c0-2.7-2.2-5-5-5c-2.7,0-5,2.2-5,5c0,0,0,0,0,0v5H5c-2.7,0-5,2.2-5,5
			s2.2,5,5,5h5v5c0,2.7,2.2,5,5,5s5-2.2,5-5v-5h5c2.7,0,5-2.2,5-5C29.7,12.1,27.5,9.9,24.8,9.9"/></g></g></svg>Field Guide</a></span>
							</div>
					        <div class="grid-item grid-4 col-xs-6 list-plus-item">
									<span class="grid-title"><a href="https://resources.pathtoimpact.org/collections/courses-and-webinars"><svg version="1.1"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
	 x="0px" y="0px" width="29.7px" height="29.7px" viewBox="0 0 29.7 29.7" enable-background="new 0 0 29.7 29.7"
	 xml:space="preserve"><g id="plusy"><g id="plusy" transform="translate(-0.002 -0.002)"><path id="Path_534_1_" fill="#FAE100" d="M24.8,9.9h-5V5c0-2.7-2.2-5-5-5c-2.7,0-5,2.2-5,5c0,0,0,0,0,0v5H5c-2.7,0-5,2.2-5,5
			s2.2,5,5,5h5v5c0,2.7,2.2,5,5,5s5-2.2,5-5v-5h5c2.7,0,5-2.2,5-5C29.7,12.1,27.5,9.9,24.8,9.9"/></g></g></svg>Webinars</a></span>
							</div>
                    </div>
                </div>
                <div class="deco-2 no-gutters row fullwidth">
                    <div class="col-sm-12 col-md-6 col-md-offset-6">
                        <a href="https://resources.pathtoimpact.org" class="btn btn-blue-light btn-top arrow-right" title="">Shop Now</a>
                    </div>
                </div>
            </div>
		</section>
		<!-- END Nu Block -->

		<!--Testimonial Block-->
            <section class="the-slider">
                <div class="container">
                    <div>
                        <?php masterslider( 1 ); ?>
                    </div> 
                </div>
            </section>



		<?php if(get_field('featured_event')): ?>

			<!--Info Block-->
			<section class="info-block upcoming-events">
				<div class="container">
				<div class="nu-img col-md-4 col-lg-6">
                           	<picture>
								<!--[if IE 9]><video style="display: none;"><![endif]-->
								<source srcset="/assets/img/dash_pattern_t.png" media="(min-width: 768px)">
								<!--[if IE 9]></video><![endif]-->
								<img srcset="/assets/img/dash_pattern_t.png" alt="">
							</picture>
				</div>
					<div class="eq-height no-gutters row">
						<div class="col-md-10 col-md-offset-1">
								<h2 class="heading-primary hlt-title">Upcoming Events</h2>
						</div>
                    </div>
                    <div class="eq-height no-gutters row">
						<div class="col-md-4 col-lg-5">
                        </div>
                        <div class="col-md-8 col-lg-6">
							<div class="info-content info-overlay">
								<div class="cal-block">
									 <div class="col-lg-2 col-xs-2">
                                        <svg version="1.1" id="cal-icon" 
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
	 x="0px" y="0px" width="60.9px" height="52.4px" viewBox="0 0 60.9 52.4" enable-background="new 0 0 60.9 52.4"
	 xml:space="preserve"><defs></defs><path fill="#E82B28" d="M58.4,0H2.5C1.1,0,0,1.1,0,2.5v47.4c0,1.4,1.1,2.5,2.5,2.5h55.9c1.4,0,2.5-1.1,2.5-2.5V2.5
	C60.9,1.1,59.7,0,58.4,0z M55.9,47.4H5V20.8h50.9V47.4z"/></svg></div>
									 <div class="col-lg-10 col-xs-10">
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
             </div>
            </div>
			</section>

		<?php endif; ?>


	</main>


<?php get_footer(); ?>