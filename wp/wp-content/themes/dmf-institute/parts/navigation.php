<!--Header-->
<header class="site-header" role="banner">

	<!--Secondary Nav-->
	<div class="secondary-nav navbar">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#PrimaryNav" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
				</button>
				<?php if(is_front_page()): ?>
					<h1 class="navbar-logo"><span class="sr-only">DMF Impact Institute</span></h1>
				<?php else: ?>
					<a href="/" class="navbar-logo" title=""><span class="sr-only">DMF Impact Institute</span></a>
				<?php endif; ?>
			</div>
			<?php
                wp_nav_menu( array(
                    'menu'              => 'top',
                    'depth'             => 1,
                    'menu_class'        => 'nav navbar-nav navbar-right'
                ));
            ?>

            <!--
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" title="">Contact Us</a></li>
				<li><a href="#" title="">Giving Hearts Day</a></li>
				<li><a href="#" class="btn btn-red" title="">Become a Member</a></li>
			</ul>
			-->
		</div>
	</div>

	<!--Primary Nav-->
	<nav class="primary-nav navbar">
		<div class="container">
			<div class="collapse navbar-collapse" id="PrimaryNav">
				<form method="get" class="main-search navbar-form navbar-right" action="<?php bloginfo('home'); ?>/" role="search">
					<label class="sr-only" for="search">Search</label>
					<input type="text" class="form-control" id="search" placeholder="Search" name="s" id="s" value="<?php echo $_GET['s']; ?>">
				</form>
				<?php
	                wp_nav_menu( array(
	                    'menu'              => 'main',
	                    'depth'             => 1,
	                    'menu_class'        => 'nav navbar-nav'
	                ));
	            ?>
			</div>
		</div>
	</nav>

</header>