<?php
// Header
global $dmf;
get_header();
?>

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

//echo $datePrintOut;
?>

<main role="main">

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

		<article class="content-block container">
			<a href="/events" class="back-link" title="">Back to Events</a>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<header class="content-header">
						<h1 class="heading-primary"><?php the_title(); ?></h1>
						<div class="row">
							<div class="col-xs-12 col-sm-7">
								<span class="article-date"><?php echo $datePrintOut; ?> | <?php the_field('location'); ?> </span>
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

						<?php the_content(); ?>

						<br /><br />


						<?php if(get_field('form_id')) : ?>

							<h2 class="heading-secondary">Get More Info</h2>
							<?php gravity_form( get_field('form_id'), false, false, false, '', false ); ?>

						<?php endif; ?>

					</div>
				</div>
			</div>
		</article>

		<!--Article Block-->
		<section class="article-block">
			<div class="container">

				<div class="article-heading row">
					<div class="col-sm-6">
						<h2 class="heading-secondary">More Events</h2>
					</div>
					<div class="col-sm-6">

					</div>
				</div>

				<!--Lower Section-->
				<div class="eq-height row">

					<?php

						//echo "<pre>";
						//print_r($cats);
						//echo "</pre>";

						$args = array(
							'numberposts' 		=> '3',
							'post_type'			=> 'event',
							'meta_key' 			=> 'start_date',
						    'orderby' 			=> 'meta_value_num',
						    'order' 			=> 'ASC',
							'post_status' 		=> 'publish',
							'exclude'			=> $post->ID
						);

						$recent_posts = wp_get_recent_posts( $args );
					?>

					<?php foreach( $recent_posts as $recent ) : ?>

                        <?php
                        $startDate = get_field('start_date', $recent['ID']);
                        $startObject = new DateTime($startDate);
                        $startTimestamp = date_timestamp_get($startObject);
                        $startMonth = date('M', $startTimestamp);
                        $startDay = date('j', $startTimestamp);
                        $startYear = date('Y', $startTimestamp);

                        $endDate = get_field('end_date', $recent['ID']);
                        $endObject = new DateTime($endDate);
                        $endTimestamp = date_timestamp_get($endObject);
                        $endMonth = date('M', $endTimestamp);
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

                        ?>

						<section class="article-item col-sm-4">
							<a href="<?php echo get_permalink($recent["ID"]); ?>" class="article-item-wrap" title="">
								<figure>

									<?php if(get_field('featured_post_image', $recent["ID"])): ?>
										<img src="<?php the_field('featured_post_image', $recent["ID"]); ?>" alt="" height="241" width="385">
									<?php else: ?>
										<img src="/assets/img/blank.jpg" alt="" height="241" width="385">
									<?php endif; ?>
								</figure>
								<div class="article-content">
									<div class="title-primary event-date"><?php echo $datePrintOut; ?>
                  </div>
                  	<div class="title-primary event-loc">
                      <?php the_field('location', $recent["ID"]); ?></div>
									<h3 class="heading-tertiary"><?php echo $recent["post_title"]; ?></h3>
									<?php echo $dmf->custom_content(25, false, $recent['post_content']); ?>
									<span class="link-more arrow-right" title="">View Event</span>
								</div>
							</a>
						</section>
					<?php endforeach; ?>

				</div>

			</div>
		</section>

	<?php endwhile; endif; ?>

</main>



<?php get_footer(); ?>
