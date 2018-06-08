<?php
// Header
/* Template Name: About */
get_header();
?>

<main role="main">

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

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

		<?php if( have_rows('content_blocks') ): ?>

		 	<?php $x=1; while ( have_rows('content_blocks') ) : the_row(); ?>

            
            <?php if($x==3) { ?>
    
        <!--Team Block-->
		<section class="content-block text-center container">
			<div class="content-header row">
				<div class="col-sm-12">
					<h2 class="heading-secondary yellow-bar">Impact Institute Team</h2>
				</div>
			</div>
			<div class="team-row row">
				
				<?php if( have_rows('staff') ): ?>

				 	<?php $t=1; while ( have_rows('staff') ) : the_row(); ?>
				 		<?php
				 			$employeeID = get_sub_field('employee');
				 		?>
				        <?php the_sub_field('sub_field_name'); ?>
				        <div class="team-item col-sm-3">
							
								<img src="<?php the_field('staff_photo', $employeeID); ?>" alt="" class="img-circle" height="170" width="170">
							
							<h3 class="item-title"><?php echo get_the_title($employeeID); ?></h3>
							<span class="sub-title"><?php the_field('staff_title', $employeeID); ?></span>
							<a href="#"  class="btn btn-blue-light"  data-toggle="modal" data-target="#staffModal-<?php echo $employeeID; ?>">
							Meet <?php echo get_the_title($employeeID); ?></a>
						</div>

						<!-- Modal -->
						<div class="modal fade" id="staffModal-<?php echo $employeeID; ?>" tabindex="-1" role="dialog" aria-labelledby="stafflLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ss-icon ss-delete"></span></button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-xs-12 col-sm-4 text-center">
												<img src="<?php the_field('staff_photo', $employeeID); ?>" alt="" class="img-circle" height="170" width="170">
											</div>
											<div class="col-xs-12 col-sm-7 col-md-6">
												<div class="info">
													<h2><?php echo get_the_title($employeeID); ?></h2>
													<div class="title"><?php the_field('staff_title', $employeeID); ?></div>
												</div>
												
												<?php 
													$content_post = get_post($employeeID);
													echo wpautop($content_post->post_content); 
												?>
											
											</div>
										</div>
									</div>
									<div class="modal-footer"></div>
								</div>
							</div>
						</div>

				    <?php $t++; endwhile; ?>

				<?php endif; ?>

			</div>
    </section>

    
            <?php } ?>
            
		        <!--Info Block-->
				<section class="info-block">
					<div class="container">
						<div class="eq-height row">
							<div class="<?php if($x==1) {echo 'col-md-6';} elseif($x==2) {echo 'col-md-6 col-md-push-6 nu-dash dasht';} elseif($x==3) {echo 'col-md-push-6 col-md-6';} ?>">
								<picture>
									<!--[if IE 9]><video style="display: none;"><![endif]-->
									<source srcset="<?php the_sub_field('image'); ?>" media="(min-width: 768px)">
									<!--[if IE 9]></video><![endif]-->
									<img srcset="<?php the_sub_field('image'); ?>" alt="">
								</picture>
							</div>
							<div class="<?php if($x==1) {echo 'col-md-6 grid-desc';} elseif($x==2) {echo 'col-md-6 col-md-pull-6';} elseif($x==3) {echo 'col-md-pull-6 col-md-6';} ?>">
								<div class="block-wrap ">
									<h2 class="heading-<?php the_sub_field('title_size'); ?> hlt-title"><?php the_sub_field('title'); ?></h2>
									<?php the_sub_field('text'); ?>
									<?php if( get_sub_field('button_link') AND get_sub_field('button_text') ): ?>
										<?php
											if(get_sub_field('color') == 'bg-red') {
												$button_color = "btn-blue";
											}
											if(get_sub_field('color') == 'bg-blue-med') {
												$button_color = "btn-blue";
											}
											else {
												$button_color = "btn-red";
											}
										?>
										<a href="<?php the_sub_field('button_link'); ?>" class="btn <?php echo $button_color; ?> btn-lg" title=""><?php the_sub_field('button_text'); ?></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</section>

		    <?php $x++; endwhile; ?>

		<?php endif; ?>




	<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
