<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $fzpcr; 

/**
 * html code for tools tab
 */

$pro_plugins = array(
	0 => array(
		'title' => 'Tracking Per Item Add-on',
		'description' => 'The Tracking per item is add-on for the Advanced Shipment Tracking for WooCommerce plugin that lets you attach tracking numbers to line items and to line item quantities.',
		'url' => 'https://www.zorem.com/products/tracking-per-item-ast-add-on/?utm_source=wp-admin&utm_medium=AST&utm_campaign=add-ons',
		'image' => 'ast-icon.png',
		'width' => '140px',
		'file' => 'ast-tracking-per-order-items/ast-tracking-per-order-items.php'
	),
	1 => array(
		'title' => 'SMS for WooCommerce',
		'description' => 'Keep your customers informed by sending them automated SMS text messages with order & delivery updates. You can send SMS notifications to customers when the order status is updated or when the shipment is out for delivery and more…',
		'url' => 'https://www.zorem.com/products/sms-for-woocommerce/?utm_source=wp-admin&utm_medium=SMSWOO&utm_campaign=add-ons',
		'image' => 'smswoo-icon.png',
		'width' => '90px',
		'file' => 'sms-for-woocommerce/sms-for-woocommerce.php'
	),
	2 => array(
		'title' => 'Advanced Order Status Manager',
		'description' => 'The Advanced Order Status Manager allows store owners to manage the WooCommerce orders statuses, create, edit, and delete custom Custom Order Statuses and integrate them into the WooCommerce orders flow.',
		'url' => 'https://www.zorem.com/products/advanced-order-status-manager/?utm_source=wp-admin&utm_medium=OSM&utm_campaign=add-ons',
		'image' => 'osm-icon.png',
		'width' => '60px',
		'file' => 'advanced-order-status-manager/advanced-order-status-manager.php'
	),
	3 => array(
		'title' => 'Sales Report Email Pro',
		'description' => 'The Sales Report Email Pro will help know how well your store is performing and how your products are selling by sending you a daily, weekly, or monthly sales report by email, directly from your WooCommerce store.',
		'url' => 'https://www.zorem.com/products/sales-report-email-for-woocommerce/?utm_source=wp-admin&utm_medium=SRE&utm_campaign=add-ons',
		'image' => 'sre-icon.png',
		'width' => '60px',
		'file' => 'sales-report-email-pro-addon/sales-report-email-pro-addon.php'
	),		
	4 => array(
		'title' => 'Country Based Restrictions Pro',
		'description' => 'The country-based restrictions plugin by zorem works by the WooCommerce Geolocation or the shipping country added by the customer and allows you to restrict products on your store to sell or not to sell to specific countries.',
		'url' => 'https://www.zorem.com/products/country-based-restriction-pro/?utm_source=wp-admin&utm_medium=CBR&utm_campaign=add-ons',
		'image' => 'cbr-icon.png',
		'width' => '70px',
		'file' => 'country-based-restriction-pro-addon/country-based-restriction-pro-addon.php'
	),
	5 => array(
		'title' => 'Customer Email Verification',
		'description' => 'The verify customers email address when they register an account or checkout on your store and filter out customers that try to create an account on your store with fake email addresses.',
		'url' => 'https://www.zorem.com/product/customer-verification-for-woocommerce/?utm_source=wp-admin&utm_medium=CEV&utm_campaign=add-ons',
		'image' => 'cev-icon.png',
		'width' => '60px',
		'file' => 'customer-email-verification-pro/customer-email-verification-pro.php'
	),				
);
?>
<section id="cbr_content4" class="cbr_tab_section">
	<div class="d_table addons_page_dtable" style="">		
		<?php if ( class_exists( 'Country_Based_Restrictions_PRO_Add_on' ) ) { ?>	
		<input id="tab_addons" type="radio" name="inner_tabs" class="cbr_tab_input" data-tab="addon" checked="">
		<label for="tab_addons" class="inner_tab_label"><?php _e( 'Add-ons', 'woo-advanced-shipment-tracking' ); ?></label>
		
		<input id="tab_license" type="radio" name="inner_tabs" class="cbr_tab_input" data-tab="addon">
		<label for="tab_license" class="inner_tab_label"><?php _e( 'License', 'woo-advanced-shipment-tracking' ); ?></label>
		<hr class="inner_tabs_hr">
		<?php } ?>				
		<section id="content_tab_addons" class="<?php if ( class_exists( 'Country_Based_Restrictions_PRO_Add_on' ) ) { ?>inner_tab_section<?php } ?>"> 
        	<div class="section-content cbr_addon_section">
            <h1 class="cbr_landing_header">Country Based Restrictions Pro</h1>
				<div class="cbr_row">
					<div class="cbr_col_6">
						<div class="cbr_col_inner">
                            <ul class="cbr_premium">
                                <li><img class="feature_thumbnail" src="<?php echo $fzpcr->plugin_dir_url(__FILE__)?>assets/images/GeoLocation.png">
                                    <div class="feature_desc">
                                        <h4>GeoLocation Detection</h4>
                                        <p>Manage your order statuses, import all statuses, customize, create custom statuses and emails</p>
                                    </div>
                                </li>
                                <li><img class="feature_thumbnail" src="<?php echo $fzpcr->plugin_dir_url(__FILE__)?>assets/images/Debug-Mode.png">
                                    <div class="feature_desc">
                                        <h4>Debug Mode</h4>
                                        <p>Enable a debug mode to display a toolbar on the store front-end, visible only for store admin and displays the detected country by the CBR plugin.</p>
                                    </div>
                                </li>
								<li><img class="feature_thumbnail" src="<?php echo $fzpcr->plugin_dir_url(__FILE__)?>assets/images/payment-gateway-by-country.png">
                                    <div class="feature_desc">
                                        <h4>Payment Gateway by Country</h4>
                                        <p>Enable a debug mode to display a toolbar on the store front-end, visible only for store admin and displays the detected country by the CBR plugin.</p>
                                    </div>
                                </li>
								 <li><img class="feature_thumbnail" src="<?php echo $fzpcr->plugin_dir_url(__FILE__)?>assets/images/Restrict-by-Category.png">
                                    <div class="feature_desc">
                                        <h4>Catalog Restrictions rules</h4>
                                        <p>Create bulk restriction rules based on the product category, tag, attribute or shipping class and avoid the repetitive work of adding restrictions to products.</p>
                                    </div>
                                </li>
                            </ul>
						</div>
					</div>
                    <div class="cbr_col_6">
						<div class="cbr_col_inner">
                            <ul class="cbr_premium">
                                <li><img class="feature_thumbnail" src="<?php echo $fzpcr->plugin_dir_url(__FILE__)?>assets/images/Visibility-Options.png">
                                    <div class="feature_desc">
                                        <h4>Visibility Options</h4>
                                        <p>Choose how products will display to customers from restricted countries, you can hide completely or keep them visible but non-purchasable</p>
                                    </div>
                                </li>
                                <li><img class="feature_thumbnail" src="<?php echo $fzpcr->plugin_dir_url(__FILE__)?>assets/images/Country-detection-widget.png">
                                    <div class="feature_desc">
                                        <h4>Country Detection Widget</h4>
                                        <p>The country detection widget will display the detected shipping country and allow customers to change the address while browsing your catalog.</p>
                                    </div>
                                </li>
								<li><img class="feature_thumbnail" src="<?php echo $fzpcr->plugin_dir_url(__FILE__)?>assets/images/Bulk-import-rules.png">
                                    <div class="feature_desc">
                                        <h4>Bulk import Restrictions</h4>
                                        <p>The CSV importer allows you to import country restrictions to products from CSV file to easily add or update country restriction rules to your products.</p>
                                    </div>
                                </li>
								 <li><img class="feature_thumbnail" src="<?php echo $fzpcr->plugin_dir_url(__FILE__)?>assets/images/Product-Restrictions.png">
                                    <div class="feature_desc">
                                        <h4>Product Restrictions</h4>
                                        <p>Add country restrictions to products, choose if you want toto include or exclude and select the countries you want to apply the restriction rule.</p>
                                    </div>
                                </li>
                            </ul>	
						</div>
					</div>
				</div>
                <div class="get_pro_btn">
                	<a href="https://www.zorem.com/products/country-based-restriction-pro/?utm_source=wp-admin&utm_medium=CBR&utm_campaign=add-ons" class="cbr-install install-now button" target="blank"><strong style="font-size: 18px;">UPGRADE NOW</strong></a>
                </div>
			</div>	
			
			<div class="section-content cbr_tab_inner_container">
				<div class="plugins_section free_plugin_section">
					<?php foreach($pro_plugins as $plugin){ ?>
						<div class="single_plugin">
							<div class="free_plugin_inner">
								<div class="plugin_image">
									<img src="<?php echo  $fzpcr->plugin_dir_url()?>assets/images/<?php echo $plugin['image']; ?>" width="<?php echo $plugin['width']; ?>">
								</div>
								<div class="plugin_description">
									<h3 class="plugin_title"><?php echo $plugin['title']; ?></h3>
									<p><?php echo $plugin['description']; ?></p>
									<?php 
									if ( is_plugin_active( $plugin['file'] ) ) { ?>
										<button type="button" class="button button-disabled" disabled="disabled">Installed</button>
									<?php } else{ ?>
										<a href="<?php echo $plugin['url']; ?>" class="install-now button-primary" target="blank">more info</a>
									<?php } ?>								
								</div>
							</div>	
						</div>	
					<?php } ?>						
				</div>
			</div>			
		</section>
		
		<section id="content_tab_license" class="inner_tab_section">
			<?php do_action('cbr_license_tab_content_data_array'); ?>
		</section>						
	</div>
</section>
