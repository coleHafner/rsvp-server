<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >

<head>

    <title><?php echo ucfirst( strtolower( $current_page ) ) . ' - rsvp-server'; ?></title>

    <link rel="stylesheet" href="<?php echo site_url('/style/vendor/960_grid.css' ); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url('/style/vendor/jquery-ui-1.8.1.custom.css' ); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url('/style/style-admin.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo site_url('/style/style.css');?>" type="text/css" />

    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/jquery-ui/js/jquery-1.6.2.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/jquery-ui/js/jquery-ui-1.8.16.custom.min.js');?>"></script>

    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.common.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.auth.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.article.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.file.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.guest.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.mail.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.permission.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.section.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.setting.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.user.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.usertype.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/scripts/vendor/halfnerd/jquery.halfnerd.view.js');?>"></script>

</head>

<body class="font_normal bg_color_white">

    <!--nav section-->
    <div class="nav_section bg_color_tan">

		<!--nav container-->
		<div class="container_12 nav_container">

			<!--nav-->
			<div class="grid_12">

			<div class="padder_10">

				<div class="logo_container rounded_corners bg_color_tan center border_color_accent">
					<img src="/images/logo_halfnerd.png"/>
				</div>

				<div class="logo_words_container header_mega color_accent">
					Halfnerd <span class="color_orange">CMS</span>
				</div>

				<?php if(Application::haveActiveLogin()) : ?>
					<div style="position:absolute;right:0;top:20px;background-color:#eaeaea;" class="rounded_corners border_dark_grey padder_10">
						Welcome <?php echo Application::getUser()->getUserName(); ?> |
						<a href="#" id="authentication" process="logout">Logout</a>
					</div>
				<?php endif; ?>
			</div>

			</div>
			<!--/nav-->

		</div>
		<!--/nav container-->

    </div>
    <!--/nav section-->

    <!--main content section-->
    <div class="main_section">

	    <!--main content container-->
	    <div class="container_12">

			<?php if (Application::haveActiveLogin()) : ?>
				<div class="grid_3">

					<div class="go_to_site_link">
						<a href="<?php echo site_url(); ?>">
							&lt;&lt; Go To Site
						</a>
					</div>
					<?php View::load('admin/module-nav', $params); ?>
							&nbsp;
				</div>

				<div class="grid_9">

					<div class="title_bar header center padder_15 bg_gradient_linear color_orange">
						<?php echo (isset($title)) ? $title : ''; ?>
					</div>

					<?php View::load($content_view, @$params); ?>
				</div>
			<?php else : ?>
                <div class="grid_12">
                    <?php View::load($content_view, @$params); ?>
                </div>
			<?php endif; ?>

			<div class="clear"></div>
	    </div>
	    <!--/main content container-->

    </div>
    <!--/main content section-->

    <div class="footer_section bg_color_tan">
		<div class="container_12">

			<div class="grid_12">
				<div class="padder_10 center font_small">
					&copy; <?php echo date('Y'); ?>
					<span style="color:#FF0000;">|</span>
						Designed by HalfNerd
					<span style="color:#FF0000;">|</span>
					<a href="' . $this->m_common->makeLink( array( 'v' => "admin" ) ) . '">CMS Login</a>
				</div>
			</div>

			<div class="clear"></div>

		</div>
    </div>

    <iframe class="input text_input" style="height:200px;width:600px;margin:20px auto 20px auto;display:none;" id="hidden_frame" name="hidden_frame" ></iframe>

</body>
</html>