<div class='wrap'>
	<h2><?php echo get_admin_page_title(); ?></h2>
	<div class='metabox-holder'>
		<div class='postbox'>
			<h3><?php _e('Welcome to HypeLab for WordPress', 'hypelab'); ?></h3>
			<div class='inside'><?php _e('Thanks for installing the HypeLab plugin! To get started, visit the settings page to configure the SDK.', 'hypelab'); ?></div>
		</div>
	</div>
	<?php do_action('hypelab_admin_general_content'); ?>
</div>
