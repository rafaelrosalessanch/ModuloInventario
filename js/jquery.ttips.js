(function($) {
    $.fn.toolTip = function() {
        var timeOut = undefined;
        $(".tooltip").hide();
        this.bind({
            mouseleave: Hide,
            click: ShowUp
        });
        function Hide() {
            if (timeOut != undefined) {
                clearTimeout(timeOut);
            }
            var $this = this;
            timeOut = setTimeout(function() {
                timeOut = undefined;
                var tooltip = $(".tooltip." + $($this).attr("title"));
                tooltip.fadeOut(500);
            }, 2000);
        }
        function ShowUp() {
            $(".tooltip").fadeOut(200);
            clearTimeout(timeOut);
            var tooltip = $(".tooltip." + $(this).attr("title"));
            tooltip.fadeIn(500);
            var x = $(this).offset().left - 12;
            var y = $(this).offset().top + $(this).height() + 10;

            var downSpace = $(document).scrollTop() + $(window).height() - y;
            var height = tooltip.height();

            if (height > downSpace) {
                y = $(this).offset().top - tooltip.height() - 5;
            }

            tooltip.css({ left: x, top: y });
            tooltip.bind({
                mouseleave: function() {
                    $(this).fadeOut(500);
                },
                mousemove: function() {
                    clearTimeout(timeOut);
                }
            });

        }
    }
})(jQuery);

$(document).ready(function() {
    $(".hasTooltip").toolTip();
   
});