jQuery(document).ready(function() {
    jQuery("figure a").colorbox({
        rel: "figure a",
        transition: "fade",
        current: "{current}/{total}",
        previous: "&laquo;",
        next: "&raquo;",
        close: "x",
        maxWidth: "99%"
    });
    jQuery("a.galleries").colorbox({
        rel: "a.galleries",
        transition: "fade",
        current: "{current}/{total}",
        previous: "&laquo;",
        next: "&raquo;",
        close: "x",
        maxWidth: "99%"
    });
    jQuery("p.attachment a").colorbox({
        maxWidth: "99%"
    });
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 100) {
            jQuery(".scroll-to-top").fadeIn();
        } else {
            jQuery(".scroll-to-top").fadeOut();
        }
    });
    jQuery(".scroll-to-top").click(function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});