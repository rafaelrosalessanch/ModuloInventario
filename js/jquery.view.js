(function ($) {
    $.fn.view = function (source) {
        var $this = this;
        var x = 0;
        var y = 0;
        var selected = 0;
        var enter = 0;
        var element;
        var element_temp;
        var option = 0; //0 no hacer nada, 1 editar ancho, 2 editar altura, 3 editar ancho tamaño,4 editar altura tamaño, 5 mover
        var tolerancia = 1;
        var elements = [];
        var count = 0;
        var countRequest = 0;
        var drag = 0;
        var downProp = 0;
        var property_left = -1;
        var property_top = -1;

        var zoom = 75;
        var page = 0;
        var pagesCount = 0;
        var defaults = {
            dataSource: "../../Services/ServiceQuery.asmx/getPagePreview",
            list: 'red',
            background: 'yellow',
            params: []
        };
        var opts = $.extend(defaults, source);
        var pageSize = [];
        var documentSize = [];
        var pageGrid = [];
        var orderRequestIdAnverse = [];
        var orderRequestIdReverse = [];
        var countImagesRequestId = 0;
        var intanceId = "";
        var selectedLote = "";

        var width = 0;
        var height = 0;
        var left = 0;
        var top = 0;
        var rows = 0;
        var columns = 0;
        var rowspacing = 0;
        var columnspacing = 0;
        var drawInColumnDirection = false;
        var documentXpages = 0;
        var face = "anverse";

        var jump = 0;
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
        return this.each(function () {
            $(ClientIDs.workflowInstanceId).css({ visibility: "hidden" });
            intanceId = $(ClientIDs.workflowInstanceId).val();
            BuildToolBox();
            Method();

            $("#currentPage").bind({
                keypress: pageChange
            });

            $("#firstPageButton").bind({
                click: firstPage
            });

            $("#backPageButton").bind({
                click: backPage
            });

            $("#nextPageButton").bind({
                click: nextPage
            });

            $("#lastPageButton").bind({
                click: lastPage
            });

            $("#zoomValue").bind({
                change: zoomChange
            });

            $("#flipHorizontalSheet").bind({
                click: rotateSheet
            });

            $("#exitButton").bind({
                click: exitButton
            });
        });
        function rotateSheet() {
            if (face == "anverse")
                face = "reverse";
            else face = "anverse";
            buildViewerArea();
            buildContentPageData();
        };
        function BuildToolBox() {
            $this.append("<div id='viewerToolBox' class='viewerToolBox'></div><div id='viewerArea' class='viewerArea' align='center'></div>");

            $("#viewerToolBox").append("<table style='height:100%; width:100%; border-collapse: collapse; border-spacing: 0;'><tr id='viewerTableToolBox'></tr></table>");

            $("#viewerTableToolBox").append("<td id='zoomDocument' class='zoomDocument'><span>Tamaño:</span></td>");
            $("#viewerTableToolBox").append("<td style=\"width:20%;\"><div id='flipHorizontalSheet' class='flipHorizontalSheet' title='Rota la hoja horizontal en el plano'><div class=\"flipHorizontalSheetIcon\"></div><div>Voltear hoja</div></div></td>");
            $("#zoomDocument").append("<select id='zoomValue' class='viewerSelect'><option name='25'>25%</option><option name='50'>50%</option><option selected='selected' name='75'>75%</option><option name='100'>100%</option><option name='150'>150%</option><option name='200'>200%</option></select>");
            $("#viewerTableToolBox").append("<td><table id='viewerPager' style=\"width:100%;\"><tr><td id='firstPageButton' class='firstPageButton' title='Ir a la primera página'></td><td id='backPageButton' class='backPageButton' title='Ir a la página anterior'></td><td style='width:27px;'><div style='width:auto;'><input type='text' id='currentPage' class='inputText' value='' style='width:25px;height:16px;line-height:16px;text-align:center;' title='Página actual'/></div></td><td id='nextPageButton' class='nextPageButton' title='Ir a la página siguiente'></td><td id='lastPageButton' class='lastPageButton' title='Ir a la última página'></td><td id='viewerTableToolBoxInfo' title='Actual / Total'></td></tr></table></td>");

            $("#viewerTableToolBox").append("<td style=\"width:12%;\"><div id='exitButton' class='exitButton' title='Vuelve a la interfaz anterior'>Volver</div></td>");
        };
        function xmlParcer(text) {
            var xmlDocTemp;
            if (window.DOMParser) {
                parser = new DOMParser();
                xmlDocTemp = parser.parseFromString(text, "text/xml");
            }
            else // Internet Explorer
            {
                xmlDocTemp = new ActiveXObject("Microsoft.XMLDOM");
                xmlDocTemp.async = "false";
                xmlDocTemp.loadXML(text);
            }
            return xmlDocTemp;
        };
        function Method() {
            $.ajax({
                url: "../../Services/ServiceQuery.asmx/getSheet",
                asign: false,
                data: "{instanceId:'" + intanceId + "'}",
                success: function (msg) {

                    width = msg.d.Width;
                    height = msg.d.Height;
                    left = msg.d.Left;
                    top = msg.d.Top;
                    rows = msg.d.Rows;
                    columns = msg.d.Columns;
                    rowspacing = msg.d.Rowspacing;
                    columnspacing = msg.d.Colspacing;
                    drawInColumnDirection = msg.d.DrawInColumnDirection;

                    documentXpages = rows * columns;
                    $.ajax({
                        url: "../../Services/ServiceQuery.asmx/getDocumentSize",
                        asign: false,
                        data: "{instanceId:'" + intanceId + "'}",
                        success: function (msg) {
                            documentSize = msg.d;

                            $.ajax({
                                url: "../../Services/ServiceQuery.asmx/countImagesRequestId",
                                asign: false,
                                data: "{instanceId:'" + intanceId + "'}",
                                success: function (msg1) {
                                    countImagesRequestId = msg1.d;

                                    $.ajax({
                                        url: "../../Services/ServiceQuery.asmx/getImagesRequestId",
                                        asign: false,
                                        data: "{instanceId:'" + intanceId + "', page:'" + page + "', documentXpages:'" + documentXpages + "'}",
                                        success: function (data) {
                                            orderRequestIdAnverse = data.d;
                                            orderRequestIdReverse = [];
                                            var orderRequestIdAnverseAux = [];
                                            if (drawInColumnDirection) {
                                                for (var k = 0; k < rows; k = Number(k) + Number(1)) {

                                                    for (var i = 0; i < orderRequestIdAnverse.length; i = Number(i) + Number(rows)) {
                                                        if ((Number(k) + Number(i)) < orderRequestIdAnverse.length) {
                                                            orderRequestIdAnverseAux.push(orderRequestIdAnverse[Number(k) + Number(i)]);
                                                        }
                                                        else {
                                                            orderRequestIdAnverseAux.push(null);
                                                        }
                                                    }
                                                }
                                                orderRequestIdAnverse = [];
                                                for (var k = 0; k < orderRequestIdAnverseAux.length; k = Number(k) + Number(1)) {
                                                    orderRequestIdAnverse.push(orderRequestIdAnverseAux[k]);
                                                }
                                            }
                                            for (var k = 0; k < orderRequestIdAnverse.length; k = Number(k) + Number(columns)) {

                                                for (var i = columns - 1; i >= 0; i--) {
                                                    if ((Number(k) + Number(i)) < orderRequestIdAnverse.length) {
                                                        orderRequestIdReverse.push(orderRequestIdAnverse[Number(k) + Number(i)]);
                                                    }
                                                    else {
                                                        orderRequestIdReverse.push(null);
                                                    }
                                                }
                                            }
                                            if (orderRequestIdAnverse.length == 0) pagesCount = 0;
                                            else {
                                                pagesCount = (((countImagesRequestId - 1) / Number(documentXpages)) + Number(1));
                                            }
                                            pagesCount = Math.floor(pagesCount);

                                            $("#currentPage").val(Number(page) + Number(1));
                                            $("#viewerTableToolBoxInfo").empty();
                                            $("#viewerTableToolBoxInfo").append("Página " + (Number(page) + Number(1)) + " de " + pagesCount);
                                            buildViewerArea();
                                            buildContentPageData();
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
            });
        };
        function buildViewerArea() {
            $("#viewerArea").empty();
            var spacing = ($("#viewerArea").height() - (height * zoom / 100)) / 2;
            var aux = "<div id='viewerPageContainer' align='center' style='width:auto; height:auto;'><div id='viewerPage' align='left' style='margin:10px;width:" + (width * zoom / 100) + "px; height:" + (height * zoom / 100) + "px; background-color:White;'></div><div>";
            $("#viewerArea").append("<table style=\"width:100%;height:100%;\"><tr><td id='viewerPageContainer' style=\"vertical-align:middle;text-align:center;\">" + aux + "</td></tr></table>");
        };
        function buildContentPageData() {
            var contenPageData = "";
            var length = orderRequestIdAnverse.length;
            if (face == "reverse") {
                length = orderRequestIdReverse.length;
            }
            for (var k = 0; k < rows; k++) {
                for (var i = 0; i < columns; i++) {
                    if (Number(k * columns) + Number(i) >= length) break;
                    contenPageData += fillPageData(Number(k * columns) + Number(i));
                }
            }
            $("#viewerPage").append(contenPageData);
        };

        function fillPageData(index) {
            var result = "";
            var paddingTop = Number(top);
            var paddingLeft = Number(left);
            var documentHeight = (documentSize.Height * zoom / 100);
            var documentWidth = (documentSize.Width * zoom / 100);

            if (index > columns)
                paddingTop = rowspacing;
            paddingTop = paddingTop * zoom / 100;

            if ((index) % columns != 0)
                paddingLeft = columnspacing;
            else {
                if (face == "reverse") paddingLeft = (Number(width - (Number(columns * documentWidth * 100 / zoom) + Number(columnspacing * (columns - 1)))) - paddingLeft);
            }
            paddingLeft = Number(jump) + Number(paddingLeft * zoom / 100);

            if ((index) % columns == 0 && index != 0)
                result += "<br/>";
            var requestInstanceId = orderRequestIdAnverse[index];
            if (face == "reverse") {
                requestInstanceId = orderRequestIdReverse[index];
            }
            if (requestInstanceId == null) jump = Number(paddingLeft) + Number(documentWidth) - 1;
            else {
                result += "<img src='ShowImage.aspx?orderInstanceId=" + $(ClientIDs.workflowInstanceId).val() + "&requestInstanceId=" + requestInstanceId + "&countRequest=" + countRequest + "&face=" + face + "' style='padding-left:" + paddingLeft + "px; padding-top:" + paddingTop + "px;' width='" + documentWidth + "' height='" + documentHeight + "'/>";
                jump = 0;
                countRequest++;
            }
            return result;
        };
        function findAttributeGrid(list, attrName) {
            for (k = 0; k < list.length; k++) {
                if (list[k] == attrName)
                    return list[Number(k) + Number(1)];
            }
        };
        function findAttribute(list, attrName) {
            for (i = 0; i < list.length; i++) {
                if (list[i][0] == attrName)
                    return list[i][1];
            }
        };
        function zoomChange() {
            zoom = (("#zoomValue option").length);
            for (i = 0; i < (("#zoomValue option").length); i++) {
                if ($($("#zoomValue option")[i]).attr("selected") == true) {
                    zoom = $($("#zoomValue option")[i]).attr("name");
                    break;
                }
            }
            buildViewerArea();
            buildContentPageData();
        };
        function pageChange(e) {
            if (e.keyCode != 13) return;
            if (jQuery.trim($($("#currentPage")[0]).val()) == "") return;
            if (!isNaN($($("#currentPage")[0]).val())) {
                if ($($("#currentPage")[0]).val() <= pagesCount && $($("#currentPage")[0]).val() > 0) {
                    page = $($("#currentPage")[0]).val() - 1;
                    Method();
                }
            }
        };
        function firstPage() {
            if (page == 0) return;
            page = 0;
            Method();
        };
        function backPage() {
            if (page == 0) return;
            page--;
            Method();
        };
        function nextPage() {
            if (page == pagesCount - 1) return;
            page++;
            Method();
        };
        function lastPage() {
            if (page == pagesCount - 1) return;
            page = pagesCount - 1;
            Method();
        };
        function exitButton() {

            if ($("#printDocumentButton").hasClass('printDocumentButtonDisabled')) {
                $(ClientIDs.Button1).click();
            }
            else {
                $(ClientIDs.Button2).click();
            }
        };
    };

    function debug($msg) {
        if (window.console && window.console.log)
            window.console.log($msg);
    };
})(jQuery);
