(function($) { 
    // more code using $ as alias to jQuery
    $('.simplefaq-item .question').click(function() {
    	var parent = $(this).parent();
    	parent.children("div").slideToggle();
    });
})(jQuery);