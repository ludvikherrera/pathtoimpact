<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<?php
		global $dmf, $current_user, $wp_query, $post;
	?>
	<meta charset="UTF-8">
	<title><?php wp_title('//', true, 'left');  ?></title>
	<link rel="icon" href="/assets//img/favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6568196/6439992/css/fonts.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,700" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all">

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="top" class="top"></div>
	
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=515734428468792";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>	


	<div class="wrapper">

		<?php if(isset($_COOKIE['dmf_newsletter']) AND $_COOKIE['dmf_newsletter']==1): ?>

			<div class="newsletter-block header-block">
				<div class="container-full">
					<div class="middle row">
						<div class="col-md-7 col-lg-6 text-right">
							<a href="#" id="header-close" class="ss-icon ss-delete"></a>
							<span class="heading-secondary">Get the latest news & updates</span>
						</div>
						<div class="col-md-5 col-lg-6">
							<?php echo gravity_form(6, false, false, false, '', false, 12); ?>

						</div>
					</div>
				</div>
			</div>

		<?php endif; ?>


		<?php get_template_part('parts/navigation'); ?>




