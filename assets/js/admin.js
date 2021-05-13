/*header script*/
jQuery( document ).on( "click", "#activity-panel-tab-help", function() {
	"use strict";
	jQuery(this).addClass( 'is-active' );
	jQuery( '.woocommerce-layout__activity-panel-wrapper' ).addClass( 'is-open is-switching' );
});

jQuery(document).click(function(){
	"use strict";
	var $trigger = jQuery(".woocommerce-layout__activity-panel");
    if($trigger !== event.target && !$trigger.has(event.target).length){
		jQuery('#activity-panel-tab-help').removeClass( 'is-active' );
		jQuery( '.woocommerce-layout__activity-panel-wrapper' ).removeClass( 'is-open is-switching' );
    }   
});
/*header script end*/
jQuery(document).ready(function(){
	"use strict";
	jQuery(".tipTip").tipTip();
	jQuery("#wpcbr_choose_the_page_to_redirect").select2();
	jQuery('#cbrw_border_color, #cbrw_background_color, #cbrw_font_color, #cbrwl_box_background_color, #cbrwl_background_color').wpColorPicker();
	
	jQuery('.product_visibility:checked').parent().find('span').css("color", "#00ab6f");
	jQuery('.product_visibility:checked').parent().parent().parent().parent().parent().css("background", "#fff");
	
	jQuery('#wpcbr_choose_the_page_to_redirect').parent().parent().parent().hide();
	if( jQuery("#wpcbr_redirect_404_page").is(":checked") === true ){
		jQuery('#wpcbr_choose_the_page_to_redirect').parent().parent().parent().show();
	}
	
	jQuery('#wpcbr_hide_product_price1').parent().parent().parent().parent().hide();
	if( jQuery("#wpcbr_make_non_purchasable1").is(":checked") === true ){
		jQuery('#wpcbr_hide_product_price1').parent().parent().parent().parent().show();
	}
	
	jQuery("#wpcbr_message_position").parent().addClass('hidden-desc');
	if( jQuery("#wpcbr_message_position").val() === "custom_shortcode"){
		jQuery("#wpcbr_message_position").parent().removeClass('hidden-desc');
	}
	var restriction_type = jQuery(".cbr_restricted_type").find(":selected").val();
	if( restriction_type === 'all' ){
		jQuery(".restricted_countries").hide();
	}
	
});

jQuery(document).on("click", ".catelog_visibility", function(){
	"use strict";
	
	var hasClass = jQuery(this).parent().hasClass("hide-child-panel");
	
	if(hasClass === true ){
		jQuery(".catelog_visibility").parent().addClass("hide-child-panel");
		jQuery(".catelog_visibility").find('span').css("color", "#bdbdbd");
		jQuery('.catelog_visibility').css('background','');
		jQuery(this).parent().removeClass("hide-child-panel");
		jQuery(this).find('input.product_visibility').trigger("click");
		jQuery(this).css('background','#fff');
		jQuery(this).find('span').css("color", "#00ab6f");
	}
});


jQuery(document).on("change", "#wpcbr_message_position", function(){
	"use strict";
	jQuery(this).parent().addClass('hidden-desc');
	if( jQuery(this).val() === "custom_shortcode"){
		jQuery(this).parent().removeClass('hidden-desc');
	}
});

jQuery(document).on("change", "#wpcbr_make_non_purchasable1", function(){
	"use strict";
	jQuery('#wpcbr_hide_product_price1').parent().parent().parent().parent().hide();
	if( jQuery(this).is(":checked") === true){
		jQuery('#wpcbr_hide_product_price1').parent().parent().parent().parent().show();
	}
	
});
jQuery(document).on("change", "#wpcbr_redirect_404_page", function(){
	"use strict";
	jQuery('#wpcbr_choose_the_page_to_redirect').parent().parent().parent().hide();
	if( jQuery(this).is(":checked") === true){
		jQuery('#wpcbr_choose_the_page_to_redirect').parent().parent().parent().show();
	}
	
});
jQuery(document).on("change", ".cbr_restricted_type", function(){
	"use strict";
	if( jQuery(this).find(":selected").val() === 'specific' || jQuery(this).find(":selected").val() === 'excluded'){
		jQuery(".restricted_countries").show();
	}
	if(jQuery(this).find(":selected").val() === 'all' ){
		jQuery(".restricted_countries").hide();
	}
});

/*ajex call for general tab form save*/	
jQuery(document).on("click", "#cbr_setting_tab_form .cbr-save", function(){
	"use strict";
	jQuery(this).parent().find(".spinner").addClass("active");
	var form = jQuery('#cbr_setting_tab_form');
	jQuery.ajax({
		url: ajaxurl+"?action=cbr_setting_form_update",//csv_workflow_update,		
		data: form.serialize(),
		type: 'POST',
		dataType:"json",	
		success: function(response) {
			if( response.success === "true" ){
				jQuery("#cbr_setting_tab_form .spinner").removeClass("active");
				var snackbarContainer = document.querySelector('#cbr-toast-example');
				var data = {message: 'Setting saved successfully.'};
				snackbarContainer.MaterialSnackbar.showSnackbar(data);
			} else {
				//show error on front
			}
		},
		error: function(response) {
			console.log(response);			
		}
	});
	return false;
});

jQuery(document).on("click", ".cbr_tab_input", function(){
	"use strict";
	var tab = jQuery(this).data('tab');
	var label = jQuery(this).data('label');
	jQuery('.zorem-layout__header-breadcrumbs .header-breadcrumbs-last').text(label);
	var url = window.location.protocol + "//" + window.location.host + window.location.pathname+"?page=woocommerce-product-country-base-restrictions&tab="+tab;
	window.history.pushState({path:url},'',url);
	jQuery(window).trigger('resize');	
});