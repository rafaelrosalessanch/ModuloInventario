(function ($) {
    $.fn.serial = function (source) {
        var $this = this;
        var defaults = {
            dataSource: "../../Services/ServiceQuery.asmx/sendSerial",
            params: []
        };
        instanceId = source.instanceId;
        $.ajaxSetup({
            type: "POST",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            error: function (result) {
                $("#dialogContainer").append("<div id=\"dialog1\" title=\"Error\"><p>No se puede comunicar con el servidor.</p></div>");
                $("#dialog1").dialog({
                    bgiframe: true,
                    height: 140,
                    modal: true,
                    buttons: {
                        'Aceptar': function () {
                            $(this).dialog('close');
                            $("#dialog1").remove();
                        }
                    }
                });
            }
        });

        return Method();
        
        function Method() {
            $.ajax({
                url: "../../Services/ServiceQuery.asmx/sendSerial",
                asign: false,
                data: "{instanceId:'" + instanceId + "'}"
            });
        }
    };
})(jQuery);
