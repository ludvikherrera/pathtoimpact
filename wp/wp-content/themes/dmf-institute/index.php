
<?php
// Header
get_header();

global $dmf;

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
						<h1 class="page-title">Blog</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Featured Block-->
	<?php
		$featured_id = get_field('featured_article', 'options');
		$featured = get_post($featured_id);
		$primary_cat = new WPSEO_Primary_Term( 'category', $featured->ID );
		$primary_cat = $primary_cat->get_primary_term();

	?>
	<section class="featured-block container">
		<div class="eq-height no-gutters row">
			<div class="col-lg-8">
				<figure>
					<span class="article-category <?php echo get_field('category_color', 'term_'.$primary_cat); ?>">Featured Post</span>
					<img src="<?php the_field('featured_post_image', $featured->ID); ?>" alt="" height="500" width="800">
				</figure>
			</div>
			<div class="col-lg-4">
				<div class="article-content">
					<span class="title-primary"><?php echo get_the_date('M j, Y', $featured->ID); ?></span>
					<h3 class="heading-quaternary">
						<a href="<?php echo get_permalink($featured->ID); ?>" title=""><?php echo $featured->post_title; ?></a>
					</h3>
					<p><?php echo $dmf->custom_content(30, false, $featured->post_content); ?></p>
					<a href="<?php echo get_permalink($featured->ID); ?>" class="btn btn-red arrow-right" title="">Read Article</a>
				</div>
			</div>
		</div>
	</section>

	<!--Article Block-->
	<section class="article-block">
		<div class="container">

			<div class="article-heading row">
				<div class="col-sm-12">
					<div class="article-title">Category:</div>
					<div class="category-dropdown dropdown">
						<a class="btn btn-default dropdown-toggle" type="button" id="filterMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">All Categories</a>
						<ul class="dropdown-menu" aria-labelledby="filterMenu">
							<?php
	                            $blog_categories = get_categories();

	                            foreach ($blog_categories as $category) :
	                                $curr_class = "";
	                                if(is_category( $category->name )) {
	                                    $curr_class = "current-cat";
	                                }
	                        ?>
								<li><a href="/category/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>

							<?php endforeach; ?>

						</ul>
					</div>
				</div>
			</div>

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
									<?php
										$primary_cat = new WPSEO_Primary_Term( 'category', $post->ID );
										$primary_cat = $primary_cat->get_primary_term();
										$cat = get_category( $primary_cat );

									?>
									<span class="article-category <?php echo get_field('category_color', 'term_'.$primary_cat); ?>">
										<?php echo $cat->name; ?>
									</span>
									<?php if(get_field('featured_post_image', $post->ID)): ?>
										<img src="<?php the_field('featured_post_image', $post->ID); ?>" alt="" height="241" width="385">
									<?php else: ?>
										<img src="/assets/img/blank.jpg" alt="" height="241" width="385">
									<?php endif; ?>
								</figure>
								<div class="article-content">
									<span class="title-primary"><?php echo get_the_date('M j, Y', $post->ID); ?></span>
									<h3 class="heading-tertiary"><?php echo the_title(); ?></h3>
									<?php echo $dmf->custom_content(25, false, get_the_content()); ?>
									<span class="link-more arrow-right" title="">Read Article</span>
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
