jQuery('document').ready(function () {

    jQuery('.tabs a').on('click', function (e) {
        e.preventDefault();

        var $this = jQuery(this);

        if ($this.hasClass('selected'))
            return;

        $this.addClass('selected')
            .parents('li').siblings()
            .find('a').removeClass('selected');


        var $id = jQuery($this.attr('href'));
        $id.fadeIn().addClass('selected')
            .siblings('.tab-post').hide().removeClass('selected');

    });


    // top menu selection
    var listItems = "";

    // grab to selection top-menu
    jQuery('.top-menu-navigation a').each(function (index) {
        listItems += '<option value="' + this.href + '">' + this.innerHTML + '</option>'; 
    });

    jQuery('.top-menu-selection').append(listItems);

    listItems = "";
    
    // grab to selection main-menu
    jQuery('.main-menu-navigation a').each(function (index) {
        listItems += '<option value="' + this.href + '">' + this.innerHTML + '</option>'; 
    });

    jQuery('.main-menu-selection').append(listItems);

    // click to an item in selection menu and redirect
    jQuery('.top-menu-selection').on('change', function () {
        window.location = this.value;
        console.log(this.value);
    });

    jQuery('.main-menu-selection').on('change', function () {
        window.location = this.value;
        console.log(this.value);
    });

    // fix woocommerce billing address css
    // $('.shipping_address').css({'overflow': 'visible'});
    jQuery('#shiptobilling-checkbox').off('change').on('change', function (e) {
        if (jQuery(this).is(':checked')) 
            jQuery('.shipping_address').hide();
        else
            jQuery('.shipping_address').show();

    });



    // search form 
    var $post_type = jQuery('.post_type').hide();

    jQuery('.search-form input[type="text"]').on('focus', function () {
        $post_type.slideDown();
    });

    // prettyPhoto lightbox
    jQuery("a[rel^='prettyPhoto']").prettyPhoto();
});