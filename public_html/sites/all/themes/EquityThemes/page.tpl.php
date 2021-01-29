<!-- #page-wrapper -->
<div id="page-wrapper">

	<!-- #page -->
	<div id="page">

		<!-- header -->

		<header role="header" class="container clearfix">
			<!-- #pre-header -->
			<div id="pre-header" class="clearfix">
				<?php if ($page['header']) :?>                
				<?php print render($page['header']); ?>
				<?php endif; ?>                
			</div>
			<!-- END: #pre-header -->

			<!-- #header -->
			<div id="header" class="clearfix">
				<!-- #header-left -->
				<div id="header-left" class="one-third"> 
					<?php if ($logo): ?>
						<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
					<?php endif; ?>

					<?php if ($site_name || $site_slogan): ?>
					<!-- #name-and-slogan -->
					<hgroup id="name-and-slogan">
						<?php if ($site_name):?>
							<h1 id="site-name"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></h1>
						<?php endif; ?>

						<?php if ($site_slogan):?>
							<h2 id="site-slogan"><?php print $site_slogan; ?></h2>
						<?php endif; ?>
					</hgroup> 
					<!-- END:#name-and-slogan -->
					<?php endif; ?>

				</div>
				<!--END: #header-left -->  
				<div id="header_call" class="one-third">   
					<?php if ($page['header_call']) :?>                
					<?php print render($page['header_call']); ?>
					<?php endif; ?>
				</div>   

				<!-- #header -->

				<!-- #header-right -->
				<div id="header-right" class="two-third last">   
					<?php if ($page['header_right']) :?>                
					<?php print render($page['header_right']); ?>
					<?php endif; ?>
				</div>
				<!--END: #header-right -->
			</div> 
			<!-- END: #header -->

		</header>   
		<!-- END: header -->
		<div class="container round-page">
			<div id="navigation-wrapper" class="container">
				<!-- #main-navigation -->                        
				<?php if ($page['navigation']) :?>
				<?php print render($page['navigation']); ?>
				<?php endif; ?>
				<!-- END: #main-navigation -->
			</div>

			<div id="featured" class="container"> 
				<!-- #Image Slider -->                        
				<?php if ($page['slider']) :?>
				<?php print render($page['slider']); ?>
				<?php endif; ?>
				<!-- END: #Image Slider -->
			</div>



			<div id="content" class="clearfix">

				<?php if ($page['top_content']): ?>
				<!-- #top-content -->
				<div id="top-content" class="container clearfix">
					<!-- intro-page -->
					<div class="intro-page">
					<?php print render($page['top_content']); ?>
					</div>
					<!-- END: intro-page -->            
				</div>  
				<!--END: #top-content -->
				<?php endif; ?>

				<!-- #banner -->
				<div id="banner" class="container">
					<?php if ($page['banner']) : ?>
					<!-- #banner-inside -->
					<div id="banner-inside">
					<?php print render($page['banner']); ?>
					</div>
					<!-- END: #banner-inside -->        
					<?php endif; ?>
				</div>

				<!-- END: #banner -->
				<?php if ($breadcrumb && theme_get_setting('breadcrumb_display','simplecorp')):?>
				<!-- #breadcrumb -->
				<div class="container clearfix">
					<?php print $breadcrumb; ?>
				</div>
				<!-- END: #breadcrumb -->
				<?php endif; ?>

				<?php if ($messages):?>
				<!--messages -->
				<div class="container clearfix">
					<?php print $messages; ?>
				</div>
				<!--END: messages -->        
				<?php endif; ?>

				<!--#featured -->
				<div id="featured"> 
					<?php if ($page['highlighted']): ?>
						<div class="container clearfix"><?php print render($page['highlighted']); ?></div>
					<?php endif; ?>

					<?php if (theme_get_setting('highlighted_display','simplecorp')): ?>

					<?php if ($is_front): ?>  


					<?php endif; ?>

					<?php endif; ?>  
				</div>
				<!-- END: #featured -->

				<!--#main-content -->
				<div id="main-content" class="container clearfix">

					<?php if ($page['sidebar_first']) :?>
					<!--.sidebar first-->
					<div class="one-fourth">
						<aside class="sidebar">
						<?php print render($page['sidebar_first']); ?>
						</aside>
					</div>
					<!--END:.sidebar first-->
					<?php endif; ?>


					<?php if ($page['sidebar_first'] && $page['sidebar_second']) { ?>
					<div class="one-half">
					<?php } elseif ($page['sidebar_first']) { ?>
						<div class="three-fourth last">
							<?php } elseif ($page['sidebar_second']) { ?>
							<div class="three-fourth">  
								<?php } else { ?>
								<div class="clearfix">    
									<?php } ?>
									<!--#main-content-inside-->
									<div id="main-content-inside">
									<?php print render($title_prefix); ?>
									<?php if (!$is_front): ?>
									<?php if ($title): ?><h1><?php print $title; ?></h1><?php endif; ?>
									<?php endif; ?>
									<?php print render($title_suffix); ?>
									<?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
									<?php print render($page['help']); ?>
									<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
									<?php print render($page['content']); ?>
									</div>
									<!--END:#main-content-inside-->
								</div>


								<?php if ($page['sidebar_second']) :?>
								<!--.sidebar second-->
								<div class="one-fourth last">
									<aside class="sidebar">
									<?php print render($page['sidebar_second']); ?>
									</aside>
								</div>
								<!--END:.sidebar second-->
								<?php endif; ?>  

							</div>
						<!--END: #main-content -->

						<!-- #bottom-content -->
						<div id="bottom-content" class="container clearfix">

							<?php if ($page['bottom_content']): ?>
							<?php print render($page['bottom_content']); ?>
							<?php endif; ?>

							<?php if (theme_get_setting('carousel_display','simplecorp')): ?>

							<?php if ($is_front): ?>  



							<?php endif; ?>

							<?php endif; ?>  

						</div>
						<!-- END: #bottom-content -->

						<!-- #network-title -->
						<div id="network-title" class="container clearfix">
							<div class="title-network">
								<?php if ($page['network_title']) :?>
								<?php print render($page['network_title']); ?>
								<?php endif; ?>
							</div>
						</div>
						<!-- END: #network-title -->

						<!-- #network-content -->
						<div id="network-content" class="container clearfix">

							<div class="first-network network">
								<?php if ($page['network_first']) :?>
								<?php print render($page['network_first']); ?>
								<?php endif; ?>
							</div>

							<div class="second-network network">
								<?php if ($page['network_second']) :?>
								<?php print render($page['network_second']); ?>
								<?php endif; ?>
							</div>

						</div>
						<!-- END: #network-content -->


						</div> <!-- END: #content -->
					</div>
					

				</div>
				<!-- END #main-content -->
				

			</div> 
		</div>
		
		<!-- #footer -->
		<footer id="footer">

			<?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer_fourth']) :?>
			<div class="footercontainer clearfix">

				<div class="first one-fourth footer-area">
					<?php if ($page['footer_first']) :?>
					<?php print render($page['footer_first']); ?>
					<?php endif; ?>
				</div>

				<div class="one-fourth footer-area">
					<?php if ($page['footer_second']) :?>
					<?php print render($page['footer_second']); ?>
					<?php endif; ?>
				</div>

				<div class="two-fourth footer-area last">
					<?php if ($page['footer_fourth']) :?>
					<?php print render($page['footer_fourth']); ?>
					<?php endif; ?> 
				</div>

			</div>
			<?php endif; ?>

			<!-- #footer-bottom -->
			<div id="footer-bottom">
				<div class="container clearfix">
					<?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('menu', 'secondary-menu', 'links', 'clearfix')))); ?>

					<?php if ($page['footer']) :?>
					<?php print render($page['footer']); ?>
					<?php endif; ?>

					<div class="credits">
						<img alt="" src="/sites/default/files/mari-berasuransi_logo.png" style="height:30px; width:47px">&nbsp; &nbsp; &nbsp; <a href="http://www.aaji.or.id" target="_blank"><img alt="" src="/sites/default/files/Logo_AAJI_2.jpg" style="height:30px; width:64px"></a>&nbsp;&nbsp; <a href="http://www.ojk.go.id" target="_blank"><img alt="" src="/sites/default/files/ojk_logo.png" style="height:30px; width:48px"></a>                    
					</div>
				</div>
			</div>
			<!-- END: #footer-bottom -->


		</footer> 
		<!-- END #footer -->
		
	</div>
	<!-- END: #page -->
</div>
<!-- END: #page-wrapper -->