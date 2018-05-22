
<?php
// Header
get_header();

global $dmf;

$today = date( 'Y-m-d' );

$args = ( array(
	'post_type' => 'event',
	'meta_key' => 'start_date',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
	'meta_query' => array(
        array(
            'key' => 'end_date',
            'value' => $today,
            'compare' => '>=',
            'type' => 'DATE'
        )
    )
 ));

query_posts($args);

?>


<main class="site-content" role="main">
	<div class="hero-block">
		<picture>
			<!--[if IE 9]><video style="display: none;"><![endif]-->
			<source srcset="<?php the_field('events_image_desktop', 'options'); ?>" media="(min-width: 768px)">
			<!--[if IE 9]></video><![endif]-->
			<img srcset="<?php the_field('events_image_mobile', 'options'); ?>" alt="">
		</picture>
		<div class="hero-overlay hero-sm">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title">Events</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Article Block-->
	<section class="article-block">
		<div class="container">


			<div class="eq-height row">
				<?php $y=1; if(have_posts()) : while(have_posts()) : the_post(); ?>

					<?php if($y==7): ?>
						</div>

						<!--Info Grid-->
						<?php get_template_part('parts/info_grid'); ?>

						<div class="eq-height row">

					<?php endif; ?>

					<?php if($post->ID != $featured_id): ?>
						<section class="article-item col-sm-12 col-md-4">
							<a href="<?php echo get_permalink($post->ID); ?>" class="article-item-wrap" title="">
								<figure>
									
									<span class="article-category blue">
										Event
									</span>
									<?php if(get_field('featured_post_image', $post->ID)): ?>
										<img src="<?php the_field('featured_post_image', $post->ID); ?>" alt="" height="241" width="385">
									<?php else: ?>
										<img src="/assets/img/event-default.jpg" alt="" height="241" width="385">
									<?php endif; ?>
								</figure>
								<div class="article-content">
									
									<div class="title-primary">
                                        <?php
                                            $startDate = get_field('start_date');
                                            $startObject = new DateTime($startDate);
                                            $startTimestamp = date_timestamp_get($startObject);
                                            $startMonth = date('F', $startTimestamp);
                                            $startDay = date('j', $startTimestamp);
                                            $startYear = date('Y', $startTimestamp);

                                            $endDate = get_field('end_date');
                                            $endObject = new DateTime($endDate);
                                            $endTimestamp = date_timestamp_get($endObject);
                                            $endMonth = date('F', $endTimestamp);
                                            $endDay = date('j', $endTimestamp);
                                            $endYear = date('Y', $endTimestamp);

                                            $datePrintOut = "";

                                            if($startYear == $endYear) {
                                                if($startMonth == $endMonth) {
                                                    if($startDate == $endDate) {
                                                        // If the start and end date are the same, only print out the one date value: September 17, 2017
                                                        $datePrintOut = get_field('start_date');
                                                    } else {
                                                        // If the start and end date are different, but within the same month: September 17-24, 2017
                                                        $datePrintOut .= $startMonth . ' ' . $startDay . '-' . $endDay . ', ' . $startYear;
                                                    }
                                                } else {
                                                    // If the start and end date are different, and in different months: September 17 - October 20, 2017
                                                    $datePrintOut .= $startMonth . ' ' . $startDay . ' - ' . $endMonth . ' ' . $endDay . ', ' . $startYear;
                                                }
                                            } else {
                                                // If the start and end date are different, and in different months and years: September 17, 2017 - October 20, 2018
                                                $datePrintOut .= $startDate . ' - <br>' . $endDate;
                                            }

                                            echo $datePrintOut;
                                        ?>
                                    </div>
									<div class="title-primary"><?php the_field('location'); ?></div>

									<h3 class="heading-tertiary"><?php echo the_title(); ?></h3>
									<?php echo $dmf->custom_content(25, false, get_the_content()); ?>
									<span class="link-more arrow-right red" title="">View Event</span>
								</div>
							</a>
						</section>
					<?php $y++; endif; ?>

				<?php endwhile; endif; ?>
			</div>

			<div class="row">
				<div class="col-xs-12 pagination">
					<?php $dmf->wp_numeric_posts_nav(); ?>
				</div>
			</div>


		</div>
	</section>

</main>

<?php get_footer(); ?>
