jQuery(function() {
    jQuery('.woocommerce-ordering select').change(function() {
        this.form.submit();
    });
});

jQuery(document).ready(function(){
    jQuery("#tab-reviews").hide();
    jQuery("#tab-title-description").click(function(){
      jQuery("#tab-description").toggle();
      jQuery("#tab-reviews").hide();
    });
    jQuery("#tab-title-reviews").click(function(){
        jQuery("#tab-reviews").toggle();

        jQuery("#tab-description").hide();


      });
  });
