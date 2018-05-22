
<section class="info-grid shim">
	<div class="colored-grid grid-sm no-gutters row">
		<div class="title-block col-sm-12 col-md-4">
			<div class="grid-content">
				<h2 class="heading-secondary"><?php the_field('info_grid_title','options'); ?></h2>
				<p><?php the_field('info_grid_text','options'); ?></p>
			</div>
			<a href="<?php the_field('info_grid_link_url','options'); ?>" class="btn btn-blue-light btn-bottom arrow-right" title=""><?php the_field('info_grid_link_text','options'); ?></a>
		</div>

		<?php if( have_rows('info_grid_blocks','options') ): ?>

		 	<?php $x=1; while ( have_rows('info_grid_blocks','options') ) : the_row(); ?>

		       
		        <div class="grid-item grid-<?php echo $x; ?> hidden-xs col-xs-6 col-sm-3 col-md-2">
					<div class="grid-wrap">
						<img src="<?php the_sub_field('block_icon'); ?>" alt="" height="60" width="60">
						<span class="grid-title"><?php the_sub_field('block_text'); ?></span>
					</div>
				</div>

		    <?php $x++; endwhile; ?>

		<?php endif; ?>

	</div>
</section>