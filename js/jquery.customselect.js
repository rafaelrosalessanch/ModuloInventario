/* custom select version 0.3
 * http://www.acewebdesign.com.au
 *  */

$.fn.customSelect = function (events) {
    // define defaults and override with options, if available
    // by extending the default settings, we don't modify the argument
    var defaults = {
        change: function () { }
    };
    var opts = $.extend(defaults, events);
    return this.each(function () {
        obj = $(this);
        thisTitle = this.title;
        thisIconhtml = "";
        thisValue = "";
        thisIconHtml = "";
        thisContainerId = "container" + this.id;
        hide = ""; //slow, fast
        toggle = "";
        width = obj.width() + "px";
        height = obj.css("height");
        optionSelected = null;

        $("#" + this.id + ' option:selected').each(function () {
            thisselection = $(this).html();
            thisValue = this.value;
            thisTitle = $(this).html();
            thisIcon = this.title;
            //thisIconHtml = (thisIcon=="")? "":"<img src=\"" + thisIcon + "\">";
            optionSelected = this;
        });

        obj.wrap('<div id=\"' + thisContainerId + '\" class=\"cscontainer\" style=\"width:' + width + ';height:' + height + ';\"/>');
        var temp = "";
        obj.find('option').each(function () {
            temp += ("<div name=\"" + $(this).attr("value") + "\" class=\"selectitems\" style=\"width:" + width + ";height:" + height + ";line-height:" + height + ";\">" + ((this.title == "") ? "" : "<img src=\"" + this.title + "\" />") + "<span>" + $(this).html() + "</span></div>");
        });
        obj.after("<div class=\"selectoptions\" style=\"width:" + width + ";\">" + temp + "</div>");
        obj.before("<input type=\"hidden\" value =\"" + thisValue + "\" name=\"" + this.name + "\" class=\"customselect\"/><div class=\"iconselect\" style=\"overflow:hidden;width:" + width + ";height:" + height + ";line-height:" + height + ";background-position:right;\"><span>" + thisIconHtml + thisTitle + "</span></div><div class=\"iconselectholder\" style=\"width:" + width + ";\"> </div>").remove();

        $(optionSelected).addClass("selectedclass");
        $("#" + thisContainerId + " " + ".iconselect").click(function (e) {
            //alert("vd");
            document.onmouseup = function () { };
            parentContainer = ($(this).parents('.cscontainer').attr('id'));
            if (toggle == "") $("#" + parentContainer + " " + ".iconselectholder").toggle();
            else $("#" + parentContainer + " " + ".iconselectholder").toggle(toggle);

        });
        $("#" + thisContainerId + " " + ".iconselectholder").append($("#" + thisContainerId + " " + ".selectoptions")[0]);
        if ($("#" + thisContainerId + " " + ".iconselectholder").width() < width.split("px")[0]) $("#" + thisContainerId + " " + ".iconselectholder").css({ "width": width });
        /*obj.find('div').each(function(){
        alert("cvcv");
        if($(this).hasClass('selectitems')){
        $(this).mouseover(function(){
        $(this).addClass("hoverclass");
        });
        $(this).mouseout(function(){
        $(this).removeClass("hoverclass");
        });
        }
        else if($(this).hasClass('iconselect')){
        $(this).mouseover(function(){
        $(this).addClass("iconselecthover");
        });
        $(this).mouseout(function(){
        $(this).removeClass("iconselecthover");
        });
        $(this).click(function(){
        parentContainer = ($(this).parents('.cscontainer').attr('id'));
        if(toggle=="")$("#" + parentContainer + " " + ".iconselectholder").toggle();
        else $("#" + parentContainer + " " + ".iconselectholder").toggle(toggle);
        });
        }
        });*/
        $("#" + thisContainerId + " " + ".selectitems").mouseover(function () {
            $(this).addClass("hoverclass");
        });
        $("#" + thisContainerId + " " + ".selectitems").mouseout(function () {
            $(this).removeClass("hoverclass");
        });
        $("#" + thisContainerId + " " + ".iconselect").mouseover(function () {
            $(this).addClass("iconselecthover");
        });
        $("#" + thisContainerId + " " + ".iconselect").mouseout(function () {
            $(this).removeClass("iconselecthover");
            document.onmouseup = function () {
                $(".iconselectholder").hide();
            };
        });
        document.onmouseup = function () {
            $(".iconselectholder").hide();
        };

        $("#" + thisContainerId + " " + ".selectitems").click(function () {
            parentContainerid = $(this).parents('.cscontainer').attr('id');
            $("#" + parentContainerid + " " + ".selectedclass").removeClass("selectedclass");
            $(this).addClass("selectedclass");
            var thisselection = $(this).html();
            $("#" + parentContainerid + " " + ".customselect").val($(this).attr("name"));
            $("#" + parentContainerid + " " + ".iconselect").html(thisselection);
            if (hide == "") $("#" + parentContainerid + " " + ".iconselectholder").hide();
            else $("#" + parentContainerid + " " + ".iconselectholder").hide(hide);
            opts.change(parentContainerid, $(this).attr("name"));
        });
    });
}
