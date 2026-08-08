<?php
// Exit if accessed directly
if ( ! defined('ABSPATH') ) {
   exit;
}

if (!function_exists('brtpmj_config_callback')) {
	function brtpmj_config_callback(){
		
		if (!current_user_can('manage_options')){
			wp_die( esc_html( __('You do not have sufficient permissions to access this page.', 'better-business-reviews') ) );
		}
		
		global $brtpmj_plugin_url;
		
	?>
		<!-- Pages HTMl -->
		<div class="wrap">
			<div class="brtpmj_setting-container">
				<h2 class="brtpmj_admin_heading">Shortcodes</h2>
				<div class="brtpmj_inner-container">
					<div class="brtpmj_col-1">
						<label>Compact Widget (PRO)</label>	
					</div>
					<div class="brtpmj_col-2">
						<span class="brtpmj_shortcode">[brtpmj_compact_widget]</span>
					</div>								
				</div>
			</div>
		</div>
	
	<?php
	}
}
