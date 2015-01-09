function initMenus() {
    $('ul.menu ul').hide();
    $.each($('ul.menu'), function() {
        $('#' + this.id + '.expandfirst ul:first').show();
    });
    $('ul.menu li a').click(
		function () {
		    var checkElement = $(this).next();
		    var parent = this.parentNode.parentNode.id;
		    //alert(parent);
		    if (parent != "") {
		        if ($('#' + parent).hasClass('noaccordion')) {
		            $(this).next().slideToggle('fast');
		            return false;
		        } 
		    }
		    if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		        if ($('#' + parent).hasClass('collapsible')) {
		            $('#' + parent + ' ul:visible').slideUp('fast');
		            $(this).toggleClass("active");
		        }
		        return false;
		    }
		    if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		        $('#' + parent + ' ul:visible').slideUp('fast');
		        $('#' + parent + ' a.active').toggleClass("active");
		        checkElement.slideDown('fast');
		        $(this).toggleClass("active");
		        return false;
		    }
		}
	);
}

$(document).ready(function() {
    initMenus();
});