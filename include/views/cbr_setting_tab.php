<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $fzpcr; 
?>
<section id="cbr_content1" class="cbr_tab_section">
    <div class="cbr_tab_inner_container">
        <form method="post" id="cbr_setting_tab_form">
			<table class="form-table heading-table">
				<tbody>
					<tr valign="top" class="heading-box border_1">
						<td colspan="2">
							<h3 style=""><?php _e( 'Catalog Visibility', 'woo-product-country-base-restrictions' ); ?></h3>
							<div class="submit cbr-btn">
								<div class="spinner workflow_spinner" style="float:none"></div>
								<button name="save" class="cbr-save button-primary woocommerce-save-button" type="submit" value="Save changes"><?php _e( 'Save changes', 'woocommerce' ); ?></button>
								<input type="hidden" name="action" value="cbr_setting_form_update">
							</div>
						</td>
					</tr>
					<tr valign="top">
						<td class="border_2" colspan="2">
							<div class="main-panel hide-child-panel" >
								<table class="form-table catelog_visibility" style="border-top: 1px solid #e0e0e0;">
									<tbody>
										<tr valign="top">
											<th>
												<label><input name="product_visibility" value="hide_completely" type="radio" class="product_visibility" checked/> <?php _e( 'Hide Completely', 'woo-product-country-base-restrictions' ); ?><span><?php _e( 'Advanced', 'woo-product-country-base-restrictions' ); ?></span></label>
												<p class="desc"><?php _e( 'Completely hide restricted products from your store', 'woo-product-country-base-restrictions' ); ?></p>
											</th>
										</tr>
									</tbody>
								</table>
								<div class="inside">
									<?php $this->get_html( $this->get_hide_completely_settings() ); ?>
								</div>
							</div>
							<div class="main-panel hide-child-panel">
							<table class="form-table catelog_visibility">
								<tbody>
									<tr valign="top">
										<th>
											<label><input name="product_visibility" value="hide_catalog_visibility" type="radio" class="product_visibility" 
											<?php if( get_option("product_visibility") == 'hide_catalog_visibility' ) { echo 'checked'; } ?> /> <?php _e( 'Hide catalog visibility', 'woo-product-country-base-restrictions' ); ?><span><?php _e( 'Advanced', 'woo-product-country-base-restrictions' ); ?></span></label>
											<p class="desc"><?php _e( 'Hide restricted products from your shop and search results. products will still be accessible and purchasable via direct link.', 'woo-product-country-base-restrictions' ); ?></p>
										</th>
									</tr>
								</tbody>
							</table>
							<div class="inside">
								<?php $this->get_html( $this->get_product_settings() ); ?>
							</div>
						</div>
						<div class="main-panel hide-child-panel" style="">
							<table class="form-table catelog_visibility">
								<tbody>
									<tr valign="top">
										<th>
											<label><input name="product_visibility" value="show_catalog_visibility" type="radio" class="product_visibility" 
											<?php if( get_option("product_visibility") == 'show_catalog_visibility' ) { echo 'checked'; } ?> /> <?php _e( 'Catalog Visible (non purchasable)', 'woo-product-country-base-restrictions' ); ?><span><?php _e( 'Advanced', 'woo-product-country-base-restrictions' ); ?></span></label>
											<p class="desc"><?php _e( 'Display the restricted products on your catalog (non purchasable)', 'woo-product-country-base-restrictions' ); ?></p>
										</th>
									</tr>
								</tbody>
							</table>
							<div class="inside">
								<?php $this->get_html( $this->get_product_catelog_settings() ); ?>
							</div>
						</div>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="form-table heading-table">
				<tbody>
					<tr valign="top" class="heading-box border_1">
						<td colspan="2">
							<h3 style=""><?php _e( 'General Settings', 'woo-product-country-base-restrictions' ); ?></h3>
							<div class="submit cbr-btn">
								<div class="spinner workflow_spinner" style="float:none"></div>
								<button name="save" class="cbr-save button-primary woocommerce-save-button" type="submit" value="Save changes"><?php _e( 'Save changes', 'woocommerce' ); ?></button>
								<?php wp_nonce_field( 'cbr_setting_form_action', 'cbr_setting_form_nonce_field' ); ?>
								<input type="hidden" name="action" value="cbr_setting_form_update">
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="form-table general">
				<tbody>
					<?php $this->get_html_general_setting( $this->get_general_settings() ); ?>
				</tbody>
			</table>
			<table class="form-table visibility-message">
				<tbody>
					<?php $this->get_html_general_setting( $this->get_visibility_message_settings() ); ?>
				</tbody>
			</table>
			<?php do_action('cbr_general_widget_option_data');?>
        </form>	
    </div>
</section>