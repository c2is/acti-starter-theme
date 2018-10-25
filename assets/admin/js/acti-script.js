jQuery(document).ready(function() {

    jQuery('#acti-clear-global-cache').on('click', function(e) {
            e.preventDefault();

            jQuery.ajax({
                url: ajaxurl,
                method: 'GET',
                data: {
                    action: 'actiFlushGlobalCache'
                },
                success: function(message) {
                    jQuery('#acti-clear-global-cache-notice').html(message);
                }
            });
    });

});