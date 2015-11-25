jQuery(document).ready(function() {
    jQuery('#mycarou').carouFredSel({
        responsive: true,
        auto: true,
        items: {
            visible: 1
        },
        scroll: {
            duration: 1000,
            timeoutDuration: 2500,
            fx: 'none'
        },
    });
});