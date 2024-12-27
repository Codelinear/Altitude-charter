<?php
/**
 * The Header for our theme.
 *
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 */
?><!DOCTYPE html>
<?php
	if ($_GET && key_exists('mfn-rtl', $_GET)):
		echo '<html class="no-js" lang="ar" dir="rtl">';
	else:
?>
<html <?php language_attributes(); ?> class="no-js <?php echo esc_attr(mfn_html_classes()); ?>"<?php mfn_tag_schema(); ?> >
<?php endif; ?>

<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<?php wp_head();

global $mfn_global;

if( empty($_GET['visual']) && !empty($mfn_global['sidemenu']) ){
	// global sidemenu
	$sidemenu = new MfnSideMenu($mfn_global['sidemenu']);
	$sidemenu->css();
}

if( !empty( get_post_meta(get_the_ID(), 'mfn-post-js', true) ) ) echo get_post_meta(get_the_ID(), 'mfn-post-js', true);

?>
	
<!-- 	google tag manager code  -->
	
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11293394735"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'AW-11293394735');
</script>
	
	
<!-- 	end -->
	
	
	
<!-- new tagg	 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11293394735"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'AW-11293394735');
</script>
<!-- New Event Script Tag -->
	
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11293394735"></script>

<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'AW-11293394735');
</script>

<!-- Since the form, doesn't go to thank you page, we need to add this to the submit button
Event Snippet -->
<!-- Event snippet for KD - Submit Lead Form conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->


<script>
function gtag_report_conversion(url) {
var callback = function () {
if (typeof(url) != 'undefined') {
window.location = url;
}
};
gtag('event', 'conversion', {
'send_to': 'AW-11391077168/HeNvCO67zccZELCW2Lcq',
'event_callback': callback
});
return false;
}
</script>
	
<!-- 	Close tag here -->

</head>

<body <?php body_class(); ?>>

	<?php if( mfn_is_blocks() ): ?>

		<div id="Wrapper">

	<?php else: // mfn_is_blocks() ?>

		<?php
			
			if( !empty(get_post_meta(get_the_ID(), 'mfn-post-one-page', true)) && get_post_meta(get_the_ID(), 'mfn-post-one-page', true) == '1' ){
				echo '<div id="home"></div>';
			}
		?>

		<?php do_action('mfn_hook_top'); ?>

		<?php get_template_part('includes/header', 'sliding-area'); ?>

		<?php
			if (mfn_header_style(true) == 'header-creative') {
				get_template_part('includes/header', 'creative');
			}
		?>

		<div id="Wrapper">

	<?php

		if (mfn_header_style(true) == 'header-below') {
			echo mfn_slider();
		}

		// be setup wizard
		if( isset( $_GET['mfn-setup-preview'] ) ) {
			$mfn_global['header'] = false;
		}

		if( $mfn_global['header'] ){
			$is_visual = false;
			if( !empty($_GET['visual']) ) $is_visual = true;
			get_template_part( 'includes/header', 'template', array( 'id' => $mfn_global['header'], 'visual' => $is_visual ) );
		}else{
			get_template_part( 'includes/header', 'classic' );
		}

		if ( 'intro' == get_post_meta( mfn_ID(), 'mfn-post-template', true ) ) {
			get_template_part( 'includes/header', 'single-intro' );
		}
	?>

		<?php do_action( 'mfn_hook_content_before' ); ?>

	<?php endif; // mfn_is_blocks() ?>

<?php // omit closing php tag
