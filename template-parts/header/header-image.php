<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="custom-header">

		<div class="custom-header-media">
			<?php the_custom_header_markup(); ?>
			<img src="<?php echo get_template_directory_uri(); ?>/../v141198-childtheme/assets/images/header-<?php echo apply_filters('time_of_day', ''); ?>.jpg" alt="Perth city skyline.">
		</div>
		
	<?php get_template_part( '/template-parts/header/site', 'branding' ); ?>
	
</div><!-- .custom-header -->
