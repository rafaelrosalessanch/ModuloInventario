(function ($) {
    $.fn.jqGrid = function (options) {
        var $this = this;
        var elements = [];
        var list = [];
        var listIDs = [];

        var hold = 0;
        var refresh = 0;
        var lastRowClicked = 0;
        var firtRowClicked = -1;
        var columnsTitleResizeFlag = false;
        var deltaX = 0;
        var x = 0;
        var columnsTitleSelected = null;
        var resizing = false;
        var holdFooterFilter = false;

        var defaults = {
            dataSource: "../../Services/ServiceQuery.asmx/getSolicitudes",
            dataCountSource: "../../Services/ServiceQuery.asmx/countSolicitudes",
            loadData: function () { },
            loadDataIDs: function () { },
            dataCountSourceParameter: function () { return ""; },
            dataSourceParameter: function () { return ""; },
            updateTableEvent: function () { return false; },
            onBeforeUpdate: function (defaults) { return false; },
            onAfterUpdate: function (defaults) { return false; },
            onDblClickRow: function () { return false; },
            updateRowsEvent: function () { updateRowsEvent(); },
            getNewRow: function (id, pclass, conten) { return newRow(id, pclass, conten); },
            getNewRowHeader: function (id, pclass) { return newRowHeader(id, pclass); },
            colNames: [],
            colModel: [],
            rowsNum: 20,
            rowsList: [10, 20, 30],
            height: 300,
            width: 400,
            columnMinWidth: 35,
            columnMaxWidth: 300,
            rowHeight: 18,
            textPadding: 5,
            caption: "",
            buildHeader: true,
            buildFooter: true,
            buildFilter: true,
            multiSelect: false,
            buildPager: true,
            filterTimeInterval: 1300,
            rowButton: false,
            cellTitle: true,
            textSelecction: false,
            allowDisabled: true,
            rowButtonWidth: 20,
            loader: { label: "Cargando", width: 90, height: 33 },
            noElementsText: "No se encontraron elementos",
            status: -1,
            params: []
        };
        var opts = $.extend(defaults, options);
        var tableParameters = {
            page: 0,
            show: opts.rowsNum,
            itemsCount: 0,
            columnSelected: -1,
            sortMode: 0, //0 ascendent, 1 descendent
            filter: ""
        };
        $.ajaxSetup({
            type: "POST",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            error: function (result) {
                $("#" + $($this).attr("id") + "Loading").remove();
                hold = 0;
                $("#dialog").dialog('close');
                $("#dialog").remove();
                $("#" + $($this).attr("id") + "GridHeader").append("<div id=\"dialog\" title=\"Error\"><p>No se puede comunicar con el servidor.</p></div>");
                $("#dialog").dialog({
                    bgiframe: true,
                    height: 140,
                    modal: true,
                    buttons: {
                        'Aceptar': function () {
                            $(this).dialog('close');
                            $("#dialog").remove();
                        }
                    }
                });
            }
        });
        return this.each(function () {
            BuildTable();
            LoadData1();
        });
        function BuildTable() {
            if (opts.buildHeader) $($this).append("<div id=\"" + $($this).attr("id") + "GridHeader\" class=\"GridHeader\" style=\"width:" + (opts.width - 10) + "px;\"><table style=\"width:100%;height:100%;\"><tr><td style=\"vertical-align:middle;\">" + opts.caption + "</td></tr></table></div>");
            var columns = "";
            var tableWidth = 0;
            for (i = 0; i < opts.colNames.length; i++) {
                var aux = ((opts.colModel[i].width < opts.columnMinWidth) ? opts.columnMinWidth : (((opts.colModel[i].width > opts.columnMaxWidth) ? opts.columnMaxWidth : opts.colModel[i].width)));
                columns += "<td id=\"" + $($this).attr("id") + "Col" + i + "\" name=\"" + (opts.colModel[i].name) + "\" title=\"" + opts.colNames[i] + "\" style=\"z-index:" + (opts.colModel[i].index) + ";border-right-style:solid;border-right-width:1px;border-right-color:#D3D3D3;width:" + aux + "px;\"><div style=\"overflow:hidden;white-space:nowrap;width:" + (aux - 0) + "px;\">" + opts.colNames[i] + "</div></td>";
                tableWidth += aux;
            }

            $($this).append("<table style=\"border-color:#D3D3D3;border-width:1px;border-style:solid;border-collapse:collapse;border-spacing:0;background:#D3D3D3;width:" + (opts.width) + "px;\"><tr style=\"width:100%;padding: 0px 0px;\">" + ((opts.rowButton) ? "<td class=\"gridColumnsRowHeader\" style=\"width:" + opts.rowButtonWidth + "px;padding: 0px 0px;\"></td>" : "") + "<td style=\"overflow:hidden;padding: 0px 0px;width:" + (opts.width - 2 - ((opts.rowButton) ? (opts.rowButtonWidth) : 0)) + "px;\"><div id=\"" + $($this).attr("id") + "TableColumnsContainer\" class= \"tableColumnsContainer\" style=\"width:inherit;height:auto;\"><div id=\"" + $($this).attr("id") + "TableContainer\" class=\"tableContainer\" style=\"width:inherit;height:auto;overflow:hidden;\"><table id=\"" + $($this).attr("id") + "TableColumns\" class=\"tableColumns\" style=\"width:" + (Number(tableWidth)) + "px;\"><tr>" + columns + "</tr></table></div></div></td></tr><tr style=\"width:100%;padding: 0px 0px;\">" + ((opts.rowButton) ? "<td style=\"width:" + opts.rowButtonWidth + "px;height:" + opts.height + "px;padding: 0px 0px;vertical-align:top;\"><div id=\"" + $($this).attr("id") + "TableRowHeaderContainer\" style=\"height:inherit;width:auto;\"><div id=\"" + $($this).attr("id") + "RowHeaderContainer\" style=\"height:inherit;width:auto;overflow:hidden;\"><table id=\"" + $($this).attr("id") + "RowHeader\" class=\"RowHeader\" style=\"border-collapse:collapse;border-spacing:0;width:" + opts.rowButtonWidth + "px;padding:0px 0px;overflow:hidden;\"></table></div></td>" : "") + "<td style=\"width:" + (opts.width - 2 - ((opts.rowButton) ? (opts.rowButtonWidth) : 0)) + "px;padding: 0px 0px;\"><div id=\"" + $($this).attr("id") + "TableDataContainer\" class=\"tableDataContainer\" style=\"width:inherit;background:#FFFFFF;overflow:auto;height:" + (opts.height) + "px;\"><table id=\"" + $($this).attr("id") + "TableData\" class=\"tableData\" style=\"width:" + (Number(tableWidth)) + "px;\"><tbody id=\"" + $($this).attr("id") + "TableDataBody\"></tbody></table></div></td></tr></table>"); //inherit

            if (opts.buildFooter) {
                var options = "";
                for (i = 0; i < opts.rowsList.length; i++) {
                    if (opts.rowsList[i] == opts.rowsNum)
                        options += "<option selected=\"selected\">" + opts.rowsList[i] + "</option>";
                    else
                        options += "<option>" + opts.rowsList[i] + "</option>";
                }
                $($this).append("<div id=\"" + $($this).attr("id") + "GridFooter\" class=\"GridFooter\" style=\"width:" + (opts.width - 10) + "px;\"><table style=\"width:100%;height:100%;\"><tr><td id=\"" + $($this).attr("id") + "TableTools\" class=\"tableTools\" style=\"vertical-align:middle;overflow:hidden;width:" + ((opts.buildPager) ? 33 : 100) + "%;\" align=\"left\"><table><tr>" + ((opts.buildFilter) ? "<td style=\"vertical-align: middle;\">Filtrar:<input  id=\"" + $($this).attr("id") + "FooterFilter\" type=\"text\" class=\"footerFilter\" value=\"Escriba texto\" style=\"border-width:0px;color:#999999;font-style:italic;background:#EFEFEF;\"/></td>" : "") + "<td id=\"" + $($this).attr("id") + "UpdateButton\" class=\"footerButton updateButton\" title=\"Actualizar\"></td>" + ((opts.multiSelect) ? "<td id=\"" + $($this).attr("id") + "SelectAllButton\" class=\"footerButton selectAllButton\" title=\"Seleccionar todo\">" : "") + "</td></tr></table></td><td id=\"" + $($this).attr("id") + "TablePager\" class=\"tablePager\" style=\"vertical-align:middle;overflow:hidden;width:" + ((opts.buildPager) ? 33 : 0) + "%;\" align=\"center\">" + ((opts.buildPager) ? "<table><tr><td id=\"" + $($this).attr("id") + "FirstButton\" class=\"footerButton firstButtonDisable\"></td><td id=\"" + $($this).attr("id") + "BackButton\" class=\"footerButton backButtonDisable\"></td><td style=\"vertical-align:middle;\"><table><tr style=\"border-right-style:solid;border-right-width:1px;border-right-color:#d8daca;border-left-style:solid;border-left-width:1px;border-left-color:#d8daca;\"><td style=\"vertical-align:middle;padding-left:2px;padding-right:2px;\">P&aacute;gina</td><td style=\"vertical-align:middle;\"><input type=\"text\" id=\"" + $($this).attr("id") + "InputPage\" class=\"inputPage\" value=\"\" style=\"border-width:0;\"/></td><td style=\"vertical-align:middle;padding-left:2px;padding-right:2px;\">de</td><td id=\"" + $($this).attr("id") + "ShowPagesCount\" style=\"vertical-align:middle;padding-left:2px;padding-right:2px;width:20px;\"></td></tr></table></td><td id=\"" + $($this).attr("id") + "NextButton\" class=\"footerButton nextButton\"></td><td id=\"" + $($this).attr("id") + "LastButton\" class=\"footerButton lastButton\"></td><td style=\"vertical-align:middle;\"><select id=\"" + $($this).attr("id") + "ShowItemsSelect\" class=\"footerListBox\" style=\"background:#FFFFFF\">" + options + "</select></td></tr></table>" : "") + "</td><td id=\"" + $($this).attr("id") + "TableInfo\" align=\"right\" style=\"vertical-align:middle;overflow:hidden;width:" + ((opts.buildPager) ? 33 : 0) + "%;\"></td></tr></table></div>");
            }
            //Nifty("div#" + $($this).attr("id") + "GridHeader", "top-height");
            //Nifty("div#" + $($this).attr("id") + "GridFooter", "bottom-height");

            $("#" + $($this).attr("id") + "TableDataContainer").bind({
                scroll: tableScroll,
                mousemove: tableDataContainerMove,
                mouseout: tableDataContainerOut,
                blur: tableDataContainerBlur
            });
            $("#" + $($this).attr("id") + "RowHeader").bind({
                mousemove: tableDataContainerMove,
                mouseout: tableDataContainerOut
            });
            $("#" + $($this).attr("id") + "TableColumns td").bind({
                mousemove: columnsTitleResize,
                mousedown: columnsTitleDown,
                mouseup: columnsTitleUp
            });
            $("#" + $($this).attr("id") + "TableContainer").bind({
                mousemove: columnsTitleBarMouseMove,
                mouseup: columnsTitleUp
            });
            $("#" + $($this).attr("id") + "TableColumns td").bind({
                click: columnsClick
            });
            $("#" + $($this).attr("id") + "UpdateButton").bind({
                click: updateButtonClick
            });
            $("#" + $($this).attr("id") + "SelectAllButton").bind({
                click: selectAllButtonClick
            });
            $("#" + $($this).attr("id") + "FooterFilter").bind({
                focusin: footerFilterFocusIn,
                focusout: footerFilterFocusOut,
                keyup: footerFilterKeyUp,
                keypress: footerFilterKeyPress
            });
            $("#" + $($this).attr("id") + "FirstButton").bind({
                click: firstButtonClick
            });
            $("#" + $($this).attr("id") + "BackButton").bind({
                click: backButtonClick
            });
            $("#" + $($this).attr("id") + "NextButton").bind({
                click: nextButtonClick
            });
            $("#" + $($this).attr("id") + "LastButton").bind({
                click: lastButtonClick
            });
            $("#" + $($this).attr("id") + "InputPage").bind({
                keyup: inputPageKey,
                keypress: inputPageKeyPress,
                focusout: inputPageFocusOut
            });
            $("#" + $($this).attr("id") + "ShowItemsSelect").bind({
                change: showItemsSelectChange
            });
        };
        function tableDataContainerBlur() {
            opts.updateTableEvent();
            var temp = $("#" + $($this).attr("id") + "TableDataBody tr:not(.unservibleRow)");
            temp.removeClass("rowPar rowImpar");
            for (i = 0; i < temp.length; i += 2) $(temp[i]).addClass("rowPar");
            for (i = 1; i < temp.length; i += 2) $(temp[i]).addClass("rowImpar");
            var temp2 = $("#" + $($this).attr("id") + ":not(.disabled)");
            temp.unbind("click");
            temp.bind({
                click: Click
            });
            for (j = 0; j < opts.colNames.length; j++) {
                $("#" + $($this).attr("id") + "TableDataBody td:nth-child(" + (Number(j) + Number(1)) + ")").css({ width: ($($("#" + $($this).attr("id") + "TableColumns td")[j]).width() - 2 * opts.textPadding) + "px" });
                $("#" + $($this).attr("id") + "TableDataBody td:nth-child(" + (Number(j) + Number(1)) + ") p").css({ width: ($($("#" + $($this).attr("id") + "TableColumns td")[j]).width() - 2 * opts.textPadding) + "px" });
            }
        };
        function updateRowsEvent() {
            $("#" + $($this).attr("id") + "TableDataBody tr:not(.disabled)").bind({
                click: Click
            });
            $("#" + $($this).attr("id") + "RowHeader tr:not(.disabled)").bind({
                click: RowHeaderClick
            });
        };
        function tableScroll() {
            scrollXMethod($(this));
            scrollYMethod($(this));
        };
        function scrollXMethod(obj) {
            var aux2 = $("#" + $($this).attr("id") + "TableContainer").scrollLeft();
            $("#" + $($this).attr("id") + "TableContainer").scrollLeft(obj.scrollLeft());
            var aux = obj.scrollLeft();
            var aux1 = $("#" + $($this).attr("id") + "TableContainer").scrollLeft();
            if ((aux - aux1) > 0)
                $("#" + $($this).attr("id") + "TableContainer").css({ width: ($("#" + $($this).attr("id") + "TableContainer").width() - (aux - aux1)) + "px" });
            else {
                if ((aux2 - aux) > 0) {
                    var w = ($("#" + $($this).attr("id") + "TableContainer").width() - (aux - aux2));
                    if (w >= opts.width) w = opts.width;
                    $("#" + $($this).attr("id") + "TableContainer").css({ width: w + "px" });
                }
            }
            $("#" + $($this).attr("id") + "TableContainer").scrollLeft(obj.scrollLeft());
        };
        function scrollYMethod(obj) {
            var aux2 = $("#" + $($this).attr("id") + "RowHeaderContainer").scrollTop();
            $("#" + $($this).attr("id") + "RowHeaderContainer").scrollTop(obj.scrollTop());
            var aux = obj.scrollTop();
            var aux1 = $("#" + $($this).attr("id") + "RowHeaderContainer").scrollTop();
            if ((aux - aux1) > 0)
                $("#" + $($this).attr("id") + "RowHeaderContainer").css({ height: ($("#" + $($this).attr("id") + "RowHeaderContainer").height() - (aux - aux1)) + "px" });
            else {
                if ((aux2 - aux) > 0) {
                    var w = ($("#" + $($this).attr("id") + "RowHeaderContainer").height() - (aux - aux2));
                    if (w >= opts.height) w = opts.height;
                    $("#" + $($this).attr("id") + "RowHeaderContainer").css({ height: w + "px" });
                }
            }
            $("#" + $($this).attr("id") + "RowHeaderContainer").scrollTop(obj.scrollTop());
        };
        function canResize(obj, e) {
            var deltaX = obj.offset().left - obj.position().left;
            xx = (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0));
            if (Number(xx) > (Number(obj.position().left) + Number(obj.width())) || Number(xx) < (Number(obj.position().left) + Number(obj.width()) - Number(5))) return false;
            return true;
        };
        function columnsTitleResize(e) {
            if (!canResize($(this), e)) {
                $(this).css({ cursor: $(this).parent().css("cursor") });
                return;
            }
            $(this).css({ cursor: "e-resize" });
        };
        function columnsTitleDown(e) {
            var deltaX = $($this).offset().left - $($this).position().left;
            x = (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0));
            columnsTitleSelected = $(this);
            if (canResize(columnsTitleSelected, e)) columnsTitleResizeFlag = true;
        };
        function columnsTitleUp(e) {
            columnsTitleResizeFlag = false;
        };
        function columnsTitleBarMouseMove(e) {
            if (columnsTitleSelected == null) return;
            deltaX = $($this).offset().left - $($this).position().left;
            var w = Number(columnsTitleSelected.width()) + Number((Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) - x);
            if (w <= opts.columnMinWidth || w >= opts.columnMaxWidth) columnsTitleResizeFlag = false;
            if (!columnsTitleResizeFlag) return;
            resizing = true;
            $("#" + $($this).attr("id") + "TableContainer").css({ width: "100%" });
            var ww = Number($("#" + $($this).attr("id") + "TableColumns").width()) + Number((Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) - x);

            $("#" + columnsTitleSelected.attr("id") + " div").css({ width: (Number($($("#" + columnsTitleSelected.attr("id") + " div")[0]).width()) + Number((Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) - x)) + "px" });
            columnsTitleSelected.css({ width: w + "px" });
            $("#" + $($this).attr("id") + "TableColumns").css({ width: ww + "px" });
            $("#" + $($this).attr("id") + "TableData").css({ width: (ww) + "px" });

            $("#" + $($this).attr("id") + "TableData td:nth-child(" + (Number(columnsTitleSelected.css("z-index")) + Number(1)) + ")").css({ width: (columnsTitleSelected.width() - 2 * opts.textPadding) + "px" });
            $("#" + $($this).attr("id") + "TableData td:nth-child(" + (Number(columnsTitleSelected.css("z-index")) + Number(1)) + ") div").css({ width: (columnsTitleSelected.width() - 2 * opts.textPadding) + "px" });

            x = (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0));
        };
        function Click(e) {
            if (opts.rowButton) return;
            if (opts.multiSelect) {
                var tableRows = $("#" + $(this).parent().attr("id") + " tr:not(.unservibleRow)");
                if (e.ctrlKey == 1) {
                    if ($(this).hasClass("row_selected"))
                        $(this).removeClass("row_selected");
                    else {
                        $(this).addClass("row_selected");
                        for (i = 0; i < tableRows.length; i++) if ($(tableRows[i]).attr("name") == $(this).attr("name")) lastRowClicked = i;
                    }
                    return;
                }
                tableRows.removeClass("row_selected");

                if (e.shiftKey == 1) {
                    var index = 0;
                    for (i = 0; i < tableRows.length; i++)
                        if ($(tableRows[i]).attr("name") == $(this).attr("name"))
                            index = i;
                    for (i = ((index > lastRowClicked) ? ((lastRowClicked > firtRowClicked) ? ((firtRowClicked != -1) ? firtRowClicked : lastRowClicked) : lastRowClicked) : ((lastRowClicked < firtRowClicked) ? firtRowClicked : index)); i <= ((index > lastRowClicked) ? ((lastRowClicked > firtRowClicked) ? index : index) : ((lastRowClicked < firtRowClicked) ? firtRowClicked : lastRowClicked)); i++)
                        if (!$(tableRows[i]).hasClass('disabled'))
                            $(tableRows[i]).addClass('row_selected');
                    if ((firtRowClicked < lastRowClicked && index < firtRowClicked) || (firtRowClicked > lastRowClicked && index > firtRowClicked)) {
                        firtRowClicked = lastRowClicked;
                        lastRowClicked = index;
                    }
                    return;
                }
                $(this).addClass('row_selected');
                for (i = 0; i < tableRows.length; i++)
                    if ($(tableRows[i]).attr("name") == $(this).attr("name"))
                        lastRowClicked = i;
            }
            else {
                $("#" + $($this).attr("id") + " .row_selected").removeClass('row_selected');
                $(this).addClass('row_selected');
            }
        };
        function RowHeaderClick(e) {
            if (opts.multiSelect) {
                var tableRows = $("#" + $($this).attr("id") + "RowHeader " + "tr:not(.unservibleRow)");
                if (e.ctrlKey == 1) {
                    if ($(this).hasClass("row_selected"))
                        $(this).removeClass("row_selected");
                    else {
                        $(this).addClass("row_selected");
                        for (i = 0; i < tableRows.length; i++) if ($(tableRows[i]).attr("name") == $(this).attr("name")) lastRowClicked = i;
                    }
                    return;
                }
                tableRows.removeClass("row_selected");
                if (e.shiftKey == 1) {
                    var index = 0;
                    for (i = 0; i < tableRows.length; i++)
                        if ($(tableRows[i]).attr("name") == $(this).attr("name"))
                            index = i;
                    for (i = ((index > lastRowClicked) ? ((lastRowClicked > firtRowClicked) ? ((firtRowClicked != -1) ? firtRowClicked : lastRowClicked) : lastRowClicked) : ((lastRowClicked < firtRowClicked) ? firtRowClicked : index)); i <= ((index > lastRowClicked) ? ((lastRowClicked > firtRowClicked) ? index : index) : ((lastRowClicked < firtRowClicked) ? firtRowClicked : lastRowClicked)); i++)
                        if (!$(tableRows[i]).hasClass('disabled'))
                            $(tableRows[i]).addClass('row_selected');
                    if ((firtRowClicked < lastRowClicked && index < firtRowClicked) || (firtRowClicked > lastRowClicked && index > firtRowClicked)) {
                        firtRowClicked = lastRowClicked;
                        lastRowClicked = index;
                    }
                    return;
                }
                $(this).addClass('row_selected');
                for (i = 0; i < tableRows.length; i++)
                    if ($(tableRows[i]).attr("name") == $(this).attr("name"))
                        lastRowClicked = i;
            }
            else {
                var hasClass = $(this).hasClass('row_selected');
                $("#" + $($this).attr("id") + "RowHeader " + " .row_selected").removeClass('row_selected');
                if (!hasClass) {
                    $(this).addClass('row_selected');
                }
            }
        };
        function columnsClick() {
            if (hold == 1) return;
            if (resizing) {
                resizing = false;
                return;
            }
            if (!opts.colModel[$(this).css("z-index")].sortable) return;
            if ($(this).hasClass('column_selected_ascending')) {
                $(this).removeClass('column_selected_ascending');
                $(this).addClass('column_selected_descending');
                tableParameters.columnSelected = $(this).css("z-index");
                tableParameters.sortMode = 1;
                LoadData1();
                return;
            }
            $("#" + $($this).attr("id") + " .column_selected_ascending").removeClass('column_selected_ascending');
            $("#" + $($this).attr("id") + " .column_selected_descending").removeClass('column_selected_descending');
            $(this).addClass('column_selected_ascending');
            tableParameters.columnSelected = $(this).css("z-index");
            tableParameters.sortMode = 0;
            LoadData1();
        };
        function footerFilterFocusIn() {
            $(this).css({ "color": "#222222", "font-style": "normal", "background": "#FFFFFF" });
            if ($(this).val() == "Escriba texto") $(this).val("");
        };
        function footerFilterFocusOut() {
            if ($(this).val() == "") {
                $(this).css({ "color": "#999999", "font-style": "italic", "background": "#EFEFEF" });
                $(this).val("Escriba texto");
            }
        };
        function footerFilterKeyUp() {
            if (holdFooterFilter) return;
            holdFooterFilter = true;
            $(this).animate({ border: "0px" }, opts.filterTimeInterval,
				function () {
				    tableParameters.filter = jQuery.trim($("#" + $($this).attr("id") + "FooterFilter").val().toLowerCase());
				    if (tableParameters.filter == "escriba texto") tableParameters.filter = "";
				    tableParameters.page = 0;
				    LoadData1();

				    holdFooterFilter = false;
				}
			);
        };
        function footerFilterKeyPress(event) {
            if (event.keyCode == 13) return false;
        };
        function updateButtonClick() {
            if (opts.buildFilter) tableParameters.filter = jQuery.trim($("#" + $($this).attr("id") + "FooterFilter").val().toLowerCase());
            else tableParameters.filter = "";
            if (tableParameters.filter == "escriba texto") tableParameters.filter = "";
            LoadData1();
        };
        function selectAllButtonClick() {
            $("#" + $($this).attr("id") + "TableDataBody tr:not(.disabled):not(.unservibleRow)").addClass('row_selected');
        };
        function disableselect(e) {
            return false;
        };
        function reEnable() {
            return true;
        };
        function tableDataContainerMove() {
            if (opts.textSelecction) return;
            document.onselectstart = new Function("return false");
            document.onmousedown = disableselect;
        };
        function tableDataContainerOut() {
            if (opts.textSelecction) return;
            document.onselectstart = new Function("return true");
            document.onmousedown = reEnable;
        };
        function animateLoader(label) {
            label.animate({ opacity: 0.9 }, 600, function () {
                if (label.text() == "") {
                    label.text(".");
                    animateLoader(label);
                }
                else {
                    if (label.text() == ".") {
                        label.text("..");
                        animateLoader(label);
                    }
                    else {
                        if (label.text() == "..") {
                            label.text("...");
                            animateLoader(label);
                        }
                        else {
                            if (label.text() == "...") {
                                label.text("");
                                animateLoader(label);
                            }
                        }
                    }
                }
            });
        };
        function LoadData1() {
            $($this).append("<div id=\"" + $($this).attr("id") + "Loading\" class=\"loading\" style=\"position:absolute;width:" + opts.loader.width + "px;height:" + opts.loader.height + "px;left:" + (Number($($this).position().left) + Number(opts.width / 2 - opts.loader.width / 2)) + "px;top:" + (Number($($this).position().top) + Number($($this).height() / 2 - opts.loader.height / 2)) + "px;\"><table style=\"border-collapse:collapse;border-spacing:0;border-width:0px;width:100%;height:100%;\"><tr><td style=\"vertical-align:middle;\"><label>" + opts.loader.label + "</label><label id=\"" + $($this).attr("id") + "LoadingLabel\"></label></td></tr></table></div>");
            animateLoader($("#" + $($this).attr("id") + "LoadingLabel"));
            hold = 1;
            if (opts.buildFooter && opts.buildPager) {
                $.ajax({
                    url: opts.dataCountSource,
                    data: opts.dataCountSourceParameter(tableParameters, opts),
                    success: function (msg) {
                        tableParameters.itemsCount = msg.d
                        ////////////
                        buildPager();

                        /////////////
                        if (tableParameters.itemsCount != 0) {
                            fillTable();
                        }
                        else {
                            $("#" + $($this).attr("id") + "TableDataBody").empty();
                            $("#" + $($this).attr("id") + "Loading").remove();
                            hold = 0;
                        }
                    }
                });
            }
            else fillTable();
        };
        function fillTable() {
            $.ajax({
                url: opts.dataSource,
                data: opts.dataSourceParameter(tableParameters, opts),
                success: function (msg) {
                    opts.onBeforeUpdate(opts);

                    list = opts.loadData(msg.d);
                    listIDs = opts.loadDataIDs(msg.d);
                    $("#" + $($this).attr("id") + "RowHeader").empty();
                    $("#" + $($this).attr("id") + "TableDataBody").empty();
                    for (i = 0; i < list.length; i++) {
                        $("#" + $($this).attr("id") + "RowHeader").append(newRowHeader(listIDs[i], ((list[i][list[i].length - 1] == true && opts.allowDisabled) ? " disabled" : "")));
                        $("#" + $($this).attr("id") + "TableDataBody").append(newRow(listIDs[i], ((list[i][list[i].length - 1] == true && opts.allowDisabled) ? " disabled" : ""), list[i]));
                    }
                    $("#" + $($this).attr("id") + "TableDataBody tr:not(.unservibleRow):even").addClass("rowPar");
                    $("#" + $($this).attr("id") + "TableDataBody tr:not(.unservibleRow):odd").addClass("rowImpar");
                    $("#" + $($this).attr("id") + "TableDataBody tr:not(.disabled)").bind({
                        click: Click,
                        dblclick: opts.onDblClickRow
                    });
                    $("#" + $($this).attr("id") + "RowHeader tr:not(.disabled)").bind({
                        click: RowHeaderClick
                    });
                    $("#" + $($this).attr("id") + "Loading").remove();
                    hold = 0;
                    opts.onAfterUpdate(opts);
                }
            });
        };
        function newRow(id, pclass, conten) {
            var cells = "";
            for (j = 0; j < opts.colNames.length; j++) cells += "<td title=\"" + ((opts.cellTitle) ? conten[j] : "") + "\" style=\"width:" + (Number($($("#" + $($this).attr("id") + "TableColumns td")[j]).css("width").split("px")[0]) - 2 * opts.textPadding) + "px;overflow:hidden;white-space:nowrap;padding: 0px 0px;\"><div style=\"width:inherit;text-align:" + opts.colModel[j].align + ";padding-top:0px;padding-bottom:0px;padding-left:" + opts.textPadding + "px;padding-right:" + opts.textPadding + "px;\">" + (conten[j]) + "</div></td>";
            return "<tr name=\"" + id + "\" class=\"" + (pclass) + "\" style=\"height:" + opts.rowHeight + "px;\">" + cells + "</tr>";
        };
        function newRowHeader(id, pclass) {
            return "<tr name=\"" + id + "\" class=\"" + (pclass) + "\" style=\"height:" + opts.rowHeight + "px;\"><td style=\"width:100%;height:100%;\"></td></tr>"
        };
        function buildPager() {
            if (!opts.buildFooter) return;
            if (opts.buildPager) {
                if (tableParameters.itemsCount == 0) $("#" + $($this).attr("id") + "TableInfo").text(opts.noElementsText);
                else $("#" + $($this).attr("id") + "TableInfo").text("Mostrando " + (Number(tableParameters.page * $("#" + $($this).attr("id") + "ShowItemsSelect").val()) + Number(1)) + " - " + ((Number(tableParameters.page * $("#" + $($this).attr("id") + "ShowItemsSelect").val()) + Number($("#" + $($this).attr("id") + "ShowItemsSelect").val()) > tableParameters.itemsCount) ? tableParameters.itemsCount : (Number(tableParameters.page * $("#" + $($this).attr("id") + "ShowItemsSelect").val()) + Number($("#" + $($this).attr("id") + "ShowItemsSelect").val()))) + " de " + tableParameters.itemsCount);
            }
            if (tableParameters.itemsCount == 0)
                $("#" + $($this).attr("id") + "ShowPagesCount").text(0);
            else
                $("#" + $($this).attr("id") + "ShowPagesCount").text((tableParameters.itemsCount <= $("#" + $($this).attr("id") + "ShowItemsSelect").val()) ? 1 : Math.floor(Number((Number(tableParameters.itemsCount)) / $("#" + $($this).attr("id") + "ShowItemsSelect").val()) + Number(1)));
            $("#" + $($this).attr("id") + "InputPage").val((tableParameters.itemsCount > 0) ? (Number(tableParameters.page) + Number(1)) : 0);
            if (tableParameters.page == 0) {
                $("#" + $($this).attr("id") + "FirstButton").addClass('firstButtonDisable');
                $("#" + $($this).attr("id") + "FirstButton").removeClass('firstButton');
                $("#" + $($this).attr("id") + "BackButton").addClass('backButtonDisable');
                $("#" + $($this).attr("id") + "BackButton").removeClass('backButton');
            }
            else {
                $("#" + $($this).attr("id") + "FirstButton").removeClass('firstButtonDisable');
                $("#" + $($this).attr("id") + "FirstButton").addClass('firstButton');
                $("#" + $($this).attr("id") + "BackButton").removeClass('backButtonDisable');
                $("#" + $($this).attr("id") + "BackButton").addClass('backButton');
            }
            if (tableParameters.itemsCount == $("#" + $($this).attr("id") + "ShowItemsSelect").val() || tableParameters.page >= Math.floor((Number((Number(tableParameters.itemsCount)) / $("#" + $($this).attr("id") + "ShowItemsSelect").val())))) {
                $("#" + $($this).attr("id") + "LastButton").addClass('lastButtonDisable');
                $("#" + $($this).attr("id") + "LastButton").removeClass('lastButton');
                $("#" + $($this).attr("id") + "NextButton").addClass('nextButtonDisable');
                $("#" + $($this).attr("id") + "NextButton").removeClass('nextButton');
            }
            else {
                $("#" + $($this).attr("id") + "LastButton").removeClass('lastButtonDisable');
                $("#" + $($this).attr("id") + "LastButton").addClass('lastButton');
                $("#" + $($this).attr("id") + "NextButton").removeClass('nextButtonDisable');
                $("#" + $($this).attr("id") + "NextButton").addClass('nextButton');
            }
        };
        function firstButtonClick() {
            if (hold == 1) return;
            if (tableParameters.page <= 0) return;
            tableParameters.page = 0;
            LoadData1();
        };
        function backButtonClick() {
            if (hold == 1) return;
            if (tableParameters.page <= 0) return;
            tableParameters.page--;
            LoadData1();
        };
        function nextButtonClick() {
            if (hold == 1) return;
            if (tableParameters.itemsCount == $("#" + $($this).attr("id") + "ShowItemsSelect").val() || tableParameters.page >= ((Math.floor(Number(tableParameters.itemsCount / $("#" + $($this).attr("id") + "ShowItemsSelect").val()))))) return;
            tableParameters.page++;
            LoadData1();
        };
        function lastButtonClick() {
            if (hold == 1) return;
            if (tableParameters.itemsCount == $("#" + $($this).attr("id") + "ShowItemsSelect").val() || tableParameters.page >= ((Math.floor(Number(tableParameters.itemsCount / $("#" + $($this).attr("id") + "ShowItemsSelect").val()))))) return;
            tableParameters.page = ((Math.floor(Number(tableParameters.itemsCount / $("#" + $($this).attr("id") + "ShowItemsSelect").val()))));
            LoadData1();
        };
        function inputPageKey(event) {
            if (event.keyCode != 13) return;
            inputPage();
        };
        function inputPageKeyPress(event) {
            return event.keyCode != 13;
        };
        function inputPageFocusOut() {
            inputPage();
        };
        function inputPage() {
            if (jQuery.trim($("#" + $($this).attr("id") + "InputPage").val()) == "") return;
            if (!isNaN($("#" + $($this).attr("id") + "InputPage").val())) {
                if ($("#" + $($this).attr("id") + "InputPage").val() <= (Math.floor(Number((Number(tableParameters.itemsCount)) / $("#" + $($this).attr("id") + "ShowItemsSelect").val()) + Number(1))) && $("#" + $($this).attr("id") + "InputPage").val() > 0) {
                    tableParameters.page = $("#" + $($this).attr("id") + "InputPage").val() - 1;
                    LoadData1();
                }
            }
        };
        function showItemsSelectChange() {
            if (hold == 1) return;
            tableParameters.page = 0;
            tableParameters.show = $("#" + $($this).attr("id") + "ShowItemsSelect").val();
            LoadData1();
        };






        /******************************************************/
        function GetParams() {
            var data = '{';
            data += 'page:"' + tableParameters.page + '",cant:"' + tableParameters.show + '",columnSelected:"' + tableParameters.columnSelected + '",sortMode:"' + tableParameters.sortMode + '", sorttype:"' + tableParameters.columnSelectedSortType + '", filter:"' + tableParameters.filter + '", status:"' + opts.status + '"';
            data += '}';
            return data;
        }
        function GetParams1() {
            var data = '{columnSelected:"' + tableParameters.columnSelected + '",sortMode:"' + tableParameters.sortMode + '", sorttype:"' + tableParameters.columnSelectedSortType + '", filter:"' + tableParameters.filter + '", status:"' + opts.status + '"}';
            return data;
        }
        function GetParams2(args) {
            var data = '{identifier:"' + args + '"}';
            return data;
        }

        function sendData() {
            $.ajax({
                url: sendToAsigment.dataSource,
                data: GetParams2(),
                success: function (msg) {
                    /*hold = 1;
                    //mostrar imagen de procesando
                    list = msg.d;
                    rowCount = 0;
                    BuildPager();*/
                }
            });
        };

        function RemoveClass() {
            $("#" + $($this).attr("id") + "TableHead tr th").removeClass('sorting_asc');
            $("#" + $($this).attr("id") + "TableHead tr th").removeClass('sorting_desc');
        };
        function SelectColumn() {
            if (hold == 1) return;
            if ($(this).hasClass('sorting_asc')) {
                RemoveClass();
                $(this).addClass('sorting_desc');
                tableParameters.sortMode = 1;
            }
            else {
                RemoveClass();
                $(this).addClass('sorting_asc');
                tableParameters.sortMode = 0;
            }

            for (i = 0; i < $("#" + $($this).attr("id") + "TableHead tr th").length; i++)
                if ($("#" + $($this).attr("id") + "TableHead tr th")[i] == this) tableParameters.columnSelected = i;
            LoadData();
        };
        function Send() {
            for (i = 0; i < $("#" + $($this).attr("id") + " .row_selected").length; i++) {
                $.ajax({
                    url: sendToAsigment.dataSource,
                    async: false,
                    data: '{identifier:"' + $("#" + $($this).attr("id") + " .row_selected")[i].id + '"}',
                    success: function (msg) {
                        var response = msg.d;
                    }
                });
            }
            tableParameters.page = 0;
            LoadData();
        };
    };

    function debug($msg) {
        if (window.console && window.console.log)
            window.console.log($msg);
    };
})(jQuery);
