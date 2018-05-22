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

		        <!--Info Block-->
				<section class="info-block">
					<div class="container">
						<div class="eq-height no-gutters row">
							<div class="col-lg-6 col-lg-push-6">
								<picture>
									<!--[if IE 9]><video style="display: none;"><![endif]-->
									<source srcset="<?php the_sub_field('image'); ?>" media="(min-width: 768px)">
									<!--[if IE 9]></video><![endif]-->
									<img srcset="<?php the_sub_field('image'); ?>" alt="">
								</picture>
							</div>
							<div class="col-lg-6 col-lg-pull-6">
								<div class="block-wrap <?php if( get_sub_field('color')  != "default" ) { the_sub_field('color'); } ?>">
									<h2 class="heading-<?php the_sub_field('title_size'); ?>"><?php the_sub_field('title'); ?></h2>
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



		<!--Team Block-->
		<section class="content-block text-center container">
			<div class="content-header row">
				<div class="col-sm-12">
					<h2 class="heading-secondary">Impact Institute Team</h2>
				</div>
			</div>
			<div class="team-row row">
				
				<?php if( have_rows('staff') ): ?>

				 	<?php $x=1; while ( have_rows('staff') ) : the_row(); ?>
				 		<?php
				 			$employeeID = get_sub_field('employee');
				 		?>
				        <?php the_sub_field('sub_field_name'); ?>
				        <div class="team-item col-sm-3">
							<a href="#" data-toggle="modal" data-target="#staffModal-<?php echo $employeeID; ?>">
								<img src="<?php the_field('staff_photo', $employeeID); ?>" alt="" class="img-circle" height="170" width="170">
							</a>
							<h3 class="item-title"><?php echo get_the_title($employeeID); ?></h3>
							<span class="sub-title"><?php the_field('staff_title', $employeeID); ?></span>
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

				    <?php $x++; endwhile; ?>

				<?php endif; ?>

			</div>
		</section>


		<?php if( have_rows('stacked_blocks') ): ?>
			<!--Info Block-->
			<div class="info-block info-block-stacked shim">
				<div class="container">
					<div class="eq-height no-gutters row">

		 				<?php $x=1; while ( have_rows('stacked_blocks') ) : the_row(); ?>
				
							<section class="col-sm-6">
								<div class="block-wrap <?php the_sub_field('color'); ?>">
									<?php if(get_sub_field('image')) : ?>
										<figure>
											<img src="<?php the_sub_field('image'); ?>" alt="" height="230" width="600">
										</figure>
									<?php endif; ?>
									<div class="block-content">
										<h2 class="heading-secondary"><?php the_sub_field('title'); ?></h2>
										<?php the_sub_field('text'); ?>
										<?php
											if(get_sub_field('color') == 'bg-red') {
												$stack_button_color = "white";
											}
											else if(get_sub_field('color') == 'bg-blue-med') {
												$stack_button_color = "blue";
											}
											else if(get_sub_field('color') == 'bg-blue-light') {
												$stack_button_color = "white";
											}
											else {
												$stack_button_color = "blue";
											}
										?>
										<a href="<?php the_sub_field('button_link'); ?>" class="info-link arrow-right <?php echo $stack_button_color; ?>" title=""><?php the_sub_field('button_text'); ?></a>
									</div>
								</div>
							</section>
						
						<?php $x++; endwhile; ?>

					</div>
				</div>
			</div>
		<?php endif; ?>



	<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
