(function($) {
  'use strict';
  $(function() {
    $('[data-toggle="offcanvas"]').on("click", function() {
      $('.sidebar-offcanvas').toggleClass('active')
    });
  });
 
    $(function () {
    var url = window.location.pathname,
    urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");  
        $('ul li a').each(function () {
                if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                $(this).addClass('active');
            }
        });
    });
    
    $('[data-toggle="tooltip"]').tooltip();
    
})(jQuery);