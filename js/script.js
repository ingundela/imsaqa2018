// Sticky navbar
 //=========================
   $(document).ready(function () {
     // Custom function which toggles between sticky class (is-sticky)
        var stickyToggle = function (sticky, stickyWrapper, scrollElement) {
        var stickyHeight = sticky.outerHeight();
        var stickyTop = stickyWrapper.offset().top;
            if (scrollElement.scrollTop() >= stickyTop) {
               stickyWrapper.height(stickyHeight);
                sticky.addClass("is-sticky");
                }
                 else {
                   sticky.removeClass("is-sticky");
                    stickyWrapper.height('auto');
                    }
             };

           // Find all data-toggle="sticky-onscroll" elements
             $('[data-toggle="sticky-onscroll"]').each(function () {
               var sticky = $(this);
                var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
                sticky.before(stickyWrapper);
                sticky.addClass('sticky');

                 // Scroll & resize events
                $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
                  stickyToggle(sticky, stickyWrapper, $(this));
                 });

                // On page load
                stickyToggle(sticky, stickyWrapper, $(window));
                });
            });
// Select all links with hashe
 $('a[href*="#"]')
   // Remove links that don't actually link to anything
   .not('[href="#"]')
   .not('[href="#0"]')
   .click(function(event) {
   // On-page links
    if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
        ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top
            }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
                return false;
                } else {
                  $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                    $target.focus(); // Set focus again
                  };
                 });
              }
            }
          });        








