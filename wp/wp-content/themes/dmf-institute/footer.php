	<!--Newsletter Block-->
	<div class="newsletter-block">
		<div class="container">
			<div class="middle row">
				<div class="col-md-7 col-lg-6">
					<span class="heading-secondary">Get the latest news & updates</span>
				</div>
				<div class="col-md-5 col-lg-6">
					<?php echo gravity_form(6, false, false, false, '', false, 12); ?>

				</div>
			</div>
		</div>
	</div>

	<!--Footer-->
	<footer class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<span class="heading-secondary">Helpful Links</span>
					<div class="row">
						<div class="col-xs-6 col-sm-4">
							<a href="#" class="footer-title" title="">Impact Institute</a>
							<?php
				                wp_nav_menu( array(
				                    'menu'   => 'footer 1'
				                ));
				            ?>
						</div>
						<div class="col-xs-6 col-sm-4">
							<a href="#" class="footer-title" title="">Resources & Tools</a>
							<?php
				                wp_nav_menu( array(
				                    'menu'   => 'footer 2'
				                ));
				            ?>
						</div>
						<div class="col-xs-12 col-sm-4">
							<a href="#" class="footer-title" title="">For Members</a>
							<?php
				                wp_nav_menu( array(
				                    'menu'   			=> 'footer 3',
				                    'menu_class'        => 'column-xs'
				                ));
				            ?>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="social-wrap">
						<div class="logo-footer">
							<span class="sr-only">Impact Institute</span>
						</div>
						<ul class="social list-inline">
							<li><a href="<?php the_field('twitter','options'); ?>" class="ss-twitter" target="_blank" title=""><span class="sr-only">Twitter</span></a></li>
							<li><a href="<?php the_field('facebook','options'); ?>" class="ss-facebook" target="_blank" title=""><span class="sr-only">Facebook</span></a></li>
							<li><a href="<?php the_field('linkedin','options'); ?>" class="ss-linkedin" target="_blank" title=""><span class="sr-only">LinkedIn</span></a></li>
							<li><a href="<?php the_field('instagram','options'); ?>" class="ss-instagram" target="_blank" title=""><span class="sr-only">Instagram</span></a></li>
						</ul>
					</div>
					<div class="contact-info">
						<span class="footer-title">Impact Institute</span>
						<p><strong>Phone:</strong> (701)-356-2668</p>
						<p><strong>Email:</strong> info@impactfdn.org</p>
					</div>
				</div>
			</div>
			<div class="copyright row">
				<div class="col-md-6 col-md-offset-3">
					<p>&copy; <?php echo date('Y'); ?> Impact Foundation</p>
					<p>
						<?php the_field('copyright_text', 'options'); ?>
					</p>
				</div>
			</div>
		</div>
	</footer>

</div><!-- wrapper -->

<script src="/assets/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="/assets/js/app.js"></script>

<script>


</script>

<?php if (!WP_DEBUG) : ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59394579-1', 'auto');
  ga('send', 'pageview');

</script>
<?php endif; ?>


<?php wp_footer(); ?>

<!-- THIS_IS_THE_END -->
</body>
</html>
