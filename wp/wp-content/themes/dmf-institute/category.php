
<?php
// Header
get_header();

global $dmf;

$current_category = get_queried_object();
$thisCat = $current_category->term_id;

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

	<!--Article Block-->
	<section class="article-block">
		<div class="container">


			<div class="article-heading row">
				<div class="col-sm-12">
					<div class="article-title">Category:</div>
					<div class="category-dropdown dropdown">
						<a class="btn btn-default dropdown-toggle" type="button" id="filterMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<?php echo $current_category->name; ?>
						</a>
						<ul class="dropdown-menu" aria-labelledby="filterMenu">
							<li><a href="/blog">All Categories</a></li>
							<?php
	                            $blog_categories = get_categories();

	                            foreach ($blog_categories as $category) :
	                                $curr_class = "";
	                                if(is_category( $category->name )) {
	                                    $curr_class = "current-cat";
	                                }
	                        ?>
								<?php if($category->term_id == $thisCat): ?>
									<li class="selected"><a href="/category/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>
								<?php else: ?>
									<li><a href="/category/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>
								<?php endif; ?>

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

					<section class="article-item col-sm-4">
						<a href="<?php echo get_permalink($post->ID); ?>" class="article-item-wrap" title="">
							<figure>
								<?php
									$cat = get_category( $thisCat );
								?>
								<span class="article-category <?php echo get_field('category_color', 'term_'.$thisCat); ?>">
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


				<?php $y++; endwhile; endif; ?>
			</div>


		</div>
	</section>


</main>

<?php get_footer(); ?>
