<?php
/**
 * Server-side render for the AdSense Banner block.
 */

defined( 'ABSPATH' ) || exit;

function render_adsense_banner_block( $attributes ) {
	if ( ! sab_should_show_ads() ) {
		return '';
	}

	$defaults = [
		'adSlot'        => get_option( 'sab_default_ad_slot', '' ),
		'adFormat'      => get_option( 'sab_default_ad_format', 'auto' ),
		'responsive'    => get_option( 'sab_default_ad_responsive', true ),
		'showOnMobile'  => true,
	];

	$attrs = wp_parse_args( $attributes, $defaults );

	ob_start();
	?>
	<div class="sab-adsense-block" data-slot="<?php echo esc_attr( $attrs['adSlot'] ); ?>">
		<ins class="adsbygoogle"
			style="display:block"
			data-ad-client="<?php echo esc_attr( get_option( 'sab_adsense_client_id', '' ) ); ?>"
			data-ad-slot="<?php echo esc_attr( $attrs['adSlot'] ); ?>"
			data-ad-format="<?php echo esc_attr( $attrs['adFormat'] ); ?>"
			<?php if ( $attrs['responsive'] ) echo 'data-full-width-responsive="true"'; ?>>
		</ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<?php
	return ob_get_clean();
}
