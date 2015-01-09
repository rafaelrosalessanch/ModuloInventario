(function ($) {
    $.fn.editTemplate = function () {
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
        var drag = 0;
        var downProp = 0;
        var property_left = -1;
        var property_top = -1;
        var documentName = "";
        var documentDescription = "";
        var colores = ["transparent", "", "black", "#000000",
"navy", "#000080",
"darkblue", "#00008b",
"mediumblue", "#0000cd",
"blue", "#0000ff",
"darkgreen", "#006400",
"green", "#008000",
"teal", "#008080",
"darkcyan", "#008b8b",
"deepskyblue", "#00bfbf",
"darkturquoise", "#00ced1",
"mediumspringgreen", "#00fa9a",
"lime", "#00ff00",
"springgreen", "#00ff7f",
"aqua", "#00ffff",
"cyan", "#00ffff",
"midnightblue", "#191970",
"dodgerblue", "#1e90ff",
"lightseagreen", "#20b2aa",
"forestgreen", "#228b22",
"seagreen", "#2e8b57",
"darkslategray", "#2f4f4f",
"limegreen", "#32cd32",
"mediumseagreen", "#3cb371",
"turquoise", "#40e0d0",
"royalblue", "#4169e1",
"steelblue", "#4682b4",
"darkslateblue", "#483d8b",
"mediumturquoise", "#48d1cc",
"indigo", "#4b0082",
"darkolivegreen", "#556b2f",
"cadetblue", "#5f9ea0",
"cornflowerblue", "#6495ed",
"mediumaquamarine", "#66cdaa",
"dimgray", "#696969",
"slateblue", "#6a5acd",
"olivedrab", "#6b8e23",
"slategray", "#708090",
"lightslategrey", "#778899",
"mediumslateblue", "#7b68ee",
"lawngreen", "#7cfc00",
"chartreuse", "#7fff00",
"aquamarine", "#7fffd4",
"maroon", "#800000",
"purple", "#800080",
"olive", "#808000",
"gray", "#808080",
"skyblue", "#87ceeb",
"lightskyblue", "#87cefa",
"blueviolet", "#8a2be2",
"darkred", "#8b0000",
"darkmagenta", "#8b008b",
"saddlebrown", "#8b4513",
"darkseagreen", "#8fbc8f",
"lightgreen", "#90ee90",
"mediumpurple", "#9370db",
"darkviolet", "#9400d3",
"palegreen", "#98fb98",
"darkorchid", "#9932cc",
"yellowgreen", "#9acd32",
"sienna", "#a0522d",
"brown", "#a52a2a",
"darkgray", "#a9a9a9",
"lightblue", "#add8e6",
"greenyellow", "#adff2f",
"paleturquoise", "#afeeee",
"lightsteelblue", "#b0c4de",
"powderblue", "#b0e0e6",
"firebrick", "#b22222",
"darkgoldenrod", "#b8860b",
"mediumorchid", "#ba55d3",
"rosybrown", "#bc8f8f",
"darkkhaki", "#bdb76b",
"silver", "#c0c0c0",
"mediumvioletred", "#c71585",
"indianred", "#cd5c5c",
"peru", "#cd853f",
"chocolate", "#d2691e",
"tan", "#d2b48c",
"lightgrey", "#d3d3d3",
"thistle", "#d8bfd8",
"orchid", "#da70d6",
"goldenrod", "#daa520",
"palevioletred", "#db7093",
"crimson", "#dc143c",
"gainsboro", "#dcdcdc",
"plum", "#dda0dd",
"burlywood", "#deb887",
"lightcyan", "#e0ffff",
"lavender", "#e6e6fa",
"darksalmon", "#e9967a",
"violet", "#ee82ee",
"palegoldenrod", "#eee8aa",
"lightcoral", "#f08080",
"khaki", "#f0e68c",
"aliceblue", "#f0f8ff",
"honeydew", "#f0fff0",
"azure", "#f0ffff",
"sandybrown", "#f4a460",
"wheat", "#f5deb3",
"beige", "#f5f5dc",
"whitesmoke", "#f5f5f5",
"mintcream", "#f5fffa",
"ghostwhite", "#f8f8ff",
"salmon", "#fa8072",
"antiquewhite", "#faebd7",
"linen", "#faf0e6",
"lightgoldenrodyellow", "#fafad2",
"oldlace", "#fdf5e6",
"red", "#ff0000",
"fuchsia", "#ff00ff",
"magenta", "#ff00ff",
"deeppink", "#ff1493",
"orangered", "#ff4500",
"tomato", "#ff6347",
"hotpink", "#ff69b4",
"coral", "#ff7f50",
"darkorange", "#ff8c00",
"lightsalmon", "#ffa07a",
"orange", "#ffa500",
"lightpink", "#ffb6c1",
"pink", "#ffc0cb",
"gold", "#ffd700",
"peachpuff", "#ffdab9",
"navajowhite", "#ffdead",
"moccasin", "#ffe4b5",
"bisque", "#ffe4c4",
"mistyrose", "#ffe4e1",
"blanchedalmond", "#ffebcd",
"papayawhip", "#ffefd5",
"lavenderblush", "#fff0f5",
"seashell", "#fff5ee",
"cornsilk", "#fff8dc",
"lemonchiffon", "#fffacd",
"floralwhite", "#fffaf0",
"snow", "#fffafa",
"yellow", "#ffff00",
"lightyellow", "#ffffe0",
"ivory", "#fffff0",
"white", "#ffffff"];
        var fuentes = ["Arial",
"Arial Black",
"Arial Narrow",
"Comic Sans MS",
"Courier New",
"Impact",
"Lucida Console",
"Tahoma",
"Times New Roman",
"Verdana"];
        $.ajaxSetup({
            type: "POST",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            error: function (result) {
                $("#dialogContainer").append("<div id=\"dialog\" title=\"Error\"><p>No se puede comunicar con el servidor.</p></div>");
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
            BuildEditor();
            //BuildToolBox();
            //Method();
            //Load();
        });
        function BuildEditor() {
            $this.css("overflow", "hidden");
            $this.empty();

            BuildToolBox();
            Method();
            Load();
        };
        function BuildToolBox() {
            $this.append("<table style='background-color:#BBBBBB; padding: 0px 0px 0px 0px; width:100%; height:100%; border-collapse: separate; border-spacing: 1px;'><tr style='background-color:red; height:30px;'><td colspan='2' id='templateEditorToolBox' class='templateEditorToolBox'></td></tr><tr style='height:16px;'><td style='border-width:1px; border-color:#666666; border-style:ridge; padding-right:0px; width:0px;'></td><td class='orizontalruler'></td></tr><tr><td class='verticalruler'></td><td class='templateEditorDesignerArea' id='templateEditorDesignerArea'><div id='editorTemplateWorkArea' class='editorTemplateWorkArea'></div></td></tr><tr id='templateEditorFooter' class='templateEditorFooter'><td colspan='2'></td></tr></table>");

            $($("#templateEditorFooter td")[0]).append("<div id='designerFace' class='anverseDocument' style='text-align:center;z-index:0;overflow:hidden;width:100%;height:100%;color:red;font-family:Arial;font-size:18px;font-weight:700;'>Anverso</div>");

            $("#templateEditorToolBox").append("<table><tr id='templateEditorTableToolBox'></tr></table>");
            $("#templateEditorTableToolBox").append("<td><div title=\"Agregar un campo de tipo imagen\" class=\"inputImage\" id=\"inputImage\"><div class=\"inputImageIcon\"></div><div class=\"inputImageLabel\">Imagen</div></div></td>");
            $("#templateEditorTableToolBox").append("<td><div title=\"Agregar un campo de tipo texto\" class=\"inputTextEditor\" id=\"inputTextt\"><div class=\"inputTextIcon\"></div><div class=\"inputTextLabel\">Texto</div></div></td>");
            $("#templateEditorTableToolBox").append("<td><div title=\"Borrar un objeto\" class=\"removeObject\" id=\"removeObject\"><div class=\"inputRemoveIcon\"></div><div class=\"inputRemoveLabel\">Borrar</div></div></td>");
            $("#templateEditorTableToolBox").append("<td><div title=\"Enviar al fondo\" class=\"sendToBack\" id=\"sendToBack\"><div class=\"inputSendBackIcon\"></div><div class=\"inputSendBackLabel\">Fondo</div></div></td>");
            $("#templateEditorTableToolBox").append("<td><div title=\"Traer al frente\" class=\"sendToFront\" id=\"sendToFront\"><div class=\"inputSendFrontIcon\"></div><div class=\"inputSendFrontLabel\">Frente</div></div></td>");
            $("#templateEditorTableToolBox").append("<td><div title=\"Rotar horizontal\" class=\"flipHorizontal\" id=\"flipHorizontal\"><div class=\"inputFlipIcon\"></div><div class=\"inputFlipLabel\">Rotar</div></div></td>");
            $("#templateEditorTableToolBox").append("<td><div title=\"Mostrar propiedades\" class=\"propertyes\" id=\"propertyes\"><div class=\"inputPropertiesIcon\"></div><div class=\"inputPropertiesLabel\">Propiedades</div></div></td>");
            $("#templateEditorTableToolBox").append("<td><div title=\"Guardar cambios\" class=\"inputSave\" id=\"inputSave\"><div class=\"inputSaveIcon\"></div><div class=\"inputSaveLabel\">Guardar</div></div></td>");

            $("#templateEditorTableToolBox").append("<td><div title=\"Salir\" class=\"inputExit\" id=\"inputExit\"><div class=\"inputExitLabel\">Salir</div></div></td>");
        };
        function MouseDownDesignerFace(e) {
            DownWorkArea(e);
            ClickDesignerArea(e);
        };
        function MouseUpDesignerFace(e) {
            UpWorkArea(e);
            Up(e);
        };
        function Method() {
            /*$("#editorTemplateWorkArea").empty();
            alert(elements.length);
            for(var i=0; i<elements.length;i++){
            $("#editorTemplateWorkArea").append(elements[i]);
            }*/
            $("#editorTemplateWorkArea div").bind({
                mousedown: Down,
                mouseenter: Enter,
                mouseout: Out
            });
            $("#designerFace").bind({
                mousedown: MouseDownDesignerFace,
                mouseup: MouseUpDesignerFace,
                mousemove: Move
            });
            $("#editorTemplateWorkArea").bind({
                mousedown: DownWorkArea,
                mouseup: UpWorkArea
            });
            $("#templateEditorDesignerArea").bind({
                mousedown: ClickDesignerArea,
                mousemove: Move,
                mouseup: Up
            });
            $("#inputImage").bind({
                click: ClickToolBox
            });
            $("#inputTextt").bind({
                click: ClickToolBox
            });
            $("#inputRectangle").bind({
                click: ClickToolBox
            });
            $("#removeObject").bind({
                click: RemoveObject
            });
            $("#inputSave").bind({
                click: ClickSaveButton
            });
            $("#sendToBack").bind({
                click: ClickSendToBack
            });
            $("#propertyes").bind({
                click: Propertyes
            });
            $("#sendToFront").bind({
                click: ClickSendToFront
            });
            $("#flipHorizontal").bind({
                click: ClickFlipHorizontal
            });
            $("#inputExit").bind({
                click: ClickInputExit
            });
        };
        function BuildTablePropertyes(name) {
            $("#templateEditorDesignerArea").append("<div class='objectPropertys' id='objectPropertys'></div>");
            if (property_left == -1) {
                property_left = (Number($("#templateEditorDesignerArea").position().left) + Number($("#templateEditorDesignerArea").width()) - 200);
                property_top = $("#templateEditorDesignerArea").position().top;
            }
            $("#objectPropertys").css({ left: property_left + "px", top: property_top + "px" });
            $("#objectPropertys").append("<table name='" + name + "' style='font-size:10px;'><tr  id='objectPropertyesTitle' class='titleheader'><td><span>Propiedades</span></td><td align='right'><div id='closeButton' class='closeButton' title='Ocultar propiedades'></div></td></tr><tr class='header'><td><span>Nombre</span></td><td><span>Valor</span></td></tr></table>");
            $("#objectPropertyesTitle").bind({
                mousedown: DownPropertyes,
                mouseup: UpPropertyes
            });
            $("#objectPropertys table").css({ 'background-color': '#CCCCCC' });
            $("#closeButton").bind({
                click: Propertyes
            });
        };
        function inputEditNameOut() {
            var RegExPattern = /^([a-zA-Z]|[á]|[é]|[í]|[ó]|[ú]|[ñ]|[Á]|[É]|[Í]|[Ó]|[Ú]|[Ñ])([a-zA-Z0-9 ]|[á]|[é]|[í]|[ó]|[ú]|[ñ]|[Á]|[É]|[Í]|[Ó]|[Ú]|[Ñ])*$/;
            if (!RegExPattern.test(jQuery.trim($("#inputEditName").val())) && jQuery.trim($("#inputEditName").val()) != "") {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).attr("name", jQuery.trim($("#inputEditName").val()));
        };
        function inputEditNamePress(e) {
            if (e.keyCode != 13) return;
            $("#" + $($("#objectPropertys table")[0]).attr("name")).attr("name", jQuery.trim($("#inputEditName").val()));
        };
        function inputEditWidthOut() {
            if (!validateInteger($("#inputEditWidth").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            if (Number($("#inputEditWidth").val()) < Number(2)) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ width: jQuery.trim($("#inputEditWidth").val()) + "px" });
        };
        function inputEditWidthPress(e) {
            if (e.keyCode != 13) return;
            if (!validateInteger($("#inputEditWidth").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            if (Number($("#inputEditWidth").val()) < Number(2)) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ width: jQuery.trim($("#inputEditWidth").val()) + "px" });
        };
        function inputEditHeightOut() {
            if (!validateInteger($("#inputEditHeight").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            if (Number($("#inputEditHeight").val()) < Number(2)) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ height: jQuery.trim($("#inputEditHeight").val()) + "px" });
        };
        function inputEditHeightPress(e) {
            if (e.keyCode != 13) return;
            if (!validateInteger($("#inputEditHeight").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            if (Number($("#inputEditHeight").val()) < Number(2)) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ height: jQuery.trim($("#inputEditHeight").val()) + "px" });
        };
        function inputEditIdentifierOut() {
            var RegExPattern = /^[a-zA-Z][a-zA-Z0-9]*$/;
            if (!RegExPattern.test(jQuery.trim($("#inputEditIdentifier").val())) && jQuery.trim($("#inputEditIdentifier").val()) != "") {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).attr("name", jQuery.trim($("#inputEditIdentifier").val()));
        };
        function inputEditIdentifierPress(e) {
            if (e.keyCode != 13) return;
            var RegExPattern = /^[a-zA-Z][a-zA-Z0-9]*$/;
            if (!RegExPattern.test(jQuery.trim($("#inputEditIdentifier").val())) && jQuery.trim($("#inputEditIdentifier").val()) != "") {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).attr("name", jQuery.trim($("#inputEditIdentifier").val()));
        };
        function validateInteger(number) {
            if (jQuery.trim(number) == "") return false;
            if (isNaN(jQuery.trim(number))) return false;
            return true;
        };
        function inputEditXOut() {
            if (!validateInteger($("#inputEditX").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ left: (Number(jQuery.trim($("#inputEditX").val())) + Number($($("#editorTemplateWorkArea")[0]).position().left)) + "px" });
        };
        function inputEditXPress(e) {
            if (e.keyCode != 13) return;
            if (!validateInteger($("#inputEditX").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ left: (Number(jQuery.trim($("#inputEditX").val())) + Number($($("#editorTemplateWorkArea")[0]).position().left)) + "px" });
        };
        function inputEditYOut() {
            if (!validateInteger($("#inputEditY").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ top: (Number(jQuery.trim($("#inputEditY").val())) + Number($($("#editorTemplateWorkArea")[0]).position().top)) + "px" });
        };
        function inputEditYPress(e) {
            if (e.keyCode != 13) return;
            if (!validateInteger($("#inputEditY").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ top: (Number(jQuery.trim($("#inputEditY").val())) + Number($($("#editorTemplateWorkArea")[0]).position().top)) + "px" });
        };
        function inputEditWidth1Out() {
            if (!validateInteger($("#inputEditWidth1").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ width: jQuery.trim($("#inputEditWidth1").val()) + "px" });
        };
        function inputEditWidth1Press(e) {
            if (e.keyCode != 13) return;
            if (!validateInteger($("#inputEditWidth1").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ width: jQuery.trim($("#inputEditWidth1").val()) + "px" });
        };
        function inputEditHeight1Out() {
            if (!validateInteger($("#inputEditHeight1").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ height: jQuery.trim($("#inputEditHeight1").val()) + "px" });
        };
        function inputEditHeight1Press(e) {
            if (e.keyCode != 13) return;
            if (!validateInteger($("#inputEditHeight1").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ height: jQuery.trim($("#inputEditHeight1").val()) + "px" });
        };
        function inputEditBackColorIn() {
            //(^(#[0-9a-fA-F]{3,6})|([rR][gG][bB]([ ]*[0-255][ ]*,[ ]*[0-255][ ]*,[ ]*[0-255][ ]*)))$

            BuildColorListSelect($("#inputEditBackColor"));
        };
        function AceptBackColor() {
            $("#inputEditBackColor").val($($($(this).get(0).childNodes[1]).get(0)).text());
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ "background-color": $($(this).get(0).childNodes[0]).css("background-color") + "" });
            $("#colorListSelect").remove();
        };
        function AceptForeColor() {
            $("#inputEditForeColor").val($($($(this).get(0).childNodes[1]).get(0)).text());
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ "color": $($(this).get(0).childNodes[0]).css("background-color") + "" });
            $("#colorListSelect").remove();
        };
        function BuildColorListSelect(elem) {
            $("#colorListSelect").remove();
            $("#objectPropertys").append("<div id='colorListSelect' style='overflow:scroll; top:" + (Number(elem.position().top) + Number(elem.height()) + Number(5)) + "px; left:" + (Number(elem.position().left) + Number(1)) + "px; width:" + $("#inputEditBackColor").width() + "px; height:180px; position:absolute; z-index:" + (Number($("#objectPropertys").css("z-index")) + Number(1)) + "; background-color:white;'></div>");
            var colorListRows = "";
            for (i = 0; i < colores.length; i += 2)
                colorListRows += "<tr style='height:10px;' class='colorListRow'><td style='width:10px; background-color:" + colores[Number(i) + Number(1)] + "; border-width: 2px; border-color:white; border-style:solid;'></td><td style='width:" + ($("#inputEditBackColor").width() - 22) + "px; font-size:9px;'>" + colores[i] + "</td></tr>";
            $("#colorListSelect").append("<table>" + colorListRows + "</table>");
            if (elem.attr("id") == "inputEditBackColor") {
                $(".colorListRow").bind({
                    click: AceptBackColor
                });
            }
            else
                if (elem.attr("id") == "inputEditForeColor") {
                    $(".colorListRow").bind({
                        click: AceptForeColor
                    });
                }
        };
        function validateColor(stringColor) {
            var RegExPattern1 = /(^#([0-9a-fA-F]){3})$/;
            var RegExPattern2 = /(^#([0-9a-fA-F]){6})$/;
            var RegExPattern3 = /(^([rR][gG][bB]\([ ]*([0]*[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-5][0-5])[ ]*[,][ ]*([0]*[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-5][0-5])[ ]*[,][ ]*([0]*[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-5][0-5])[ ]*\)))$/;
            if (isStringColor(stringColor) || RegExPattern1.test(stringColor) || RegExPattern2.test(stringColor) || RegExPattern3.test(stringColor)) {
                return true;
            }
            return false;
        };
        function inputEditBackColorOut() {
            if (!validateColor(jQuery.trim($("#inputEditBackColor").val()))) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ "background-color": jQuery.trim($("#inputEditBackColor").val()) + "" });
        };
        function isStringColor(stringValue) {
            for (i = 0; i < colores.length; i += 2)
                if (colores[i] == stringValue) return true;
            return false;
        };
        function inputEditBackColorPress(e) {
            if (e.keyCode != 13) return;
            if (!validateColor(jQuery.trim($("#inputEditBackColor").val()))) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#colorListSelect").remove();
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ "background-color": jQuery.trim($("#inputEditBackColor").val()) + "" });
        };
        function selectEditFont() {
            element.css("font-family", $("#selectEditFont").val());
        };
        /*function inputEditFontOut(){
        $("#"+$($("#objectPropertys table")[0]).attr("name")).css({"font-family":  jQuery.trim($("#inputEditFont").val())+""});
        };
        function inputEditFontPress(e){
        if(e.keyCode != 13)return;
        $("#"+$($("#objectPropertys table")[0]).attr("name")).css({"font-family":  jQuery.trim($("#inputEditFont").val())+""});
        };*/
        /*function inputEditFontStyleOut(){
        $("#"+$($("#objectPropertys table")[0]).attr("name")).css({"font-style":  jQuery.trim($("#inputEditFontStyle").val())+""});
        };*/
        function selectEditFontStyle() {
            setStyle(element, $("#selectEditFontStyle").val());
        };
        function selectEditFontDecoration() {
            setDecoration(element, $("#selectEditFontDecoration").val());
        };
        function inputEditTransform() {
            for (var i = 0; i < $("#inputEditTransform option").length; i++) {
                if ($($("#inputEditTransform option")[i]).attr("selected") == true) {
                    element.css("text-transform", $($("#inputEditTransform option")[i]).attr("name"));
                    var t = element.text();
                    element.empty();
                    element.append(t);
                }
            }
            //if($("#inputEditTransform").val()=="none")
            //element.css("text-transform", $("#inputEditTransform").val());
        };
        /*function inputEditFontStylePress(e){
        if(e.keyCode != 13)return;
        $("#"+$($("#objectPropertys table")[0]).attr("name")).css({"font-style":  jQuery.trim($("#inputEditFontStyle").val())+""});
        };
        function inputEditFontWeightOut(){
        $("#"+$($("#objectPropertys table")[0]).attr("name")).css({"font-weight":  jQuery.trim($("#inputEditFontWeight").val())+""});
        };
        function inputEditFontWeightPress(e){
        if(e.keyCode != 13)return;
        $("#"+$($("#objectPropertys table")[0]).attr("name")).css({"font-weight":  jQuery.trim($("#inputEditFontWeight").val())+""});
        };*/
        function inputEditForeColorIn() {
            BuildColorListSelect($("#inputEditForeColor"));
        };
        function inputEditForeColorOut() {
            if (!validateColor(jQuery.trim($("#inputEditForeColor").val()))) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ "color": jQuery.trim($("#inputEditForeColor").val()) + "" });
        };
        function inputEditForeColorPress(e) {
            if (e.keyCode != 13) return;
            if (!validateColor(jQuery.trim($("#inputEditForeColor").val()))) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ "color": jQuery.trim($("#inputEditForeColor").val()) + "" });
        };
        function inputEditFontSizeOut() {
            if (!validateInteger($("#inputEditFontSize").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            if (jQuery.trim($("#inputEditFontSize").val()) < 1 || jQuery.trim($("#inputEditFontSize").val()) > 300) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ "font-size": jQuery.trim($("#inputEditFontSize").val()) + "px" });
        };
        function inputEditFontSizePress(e) {
            if (e.keyCode != 13) return;
            if (!validateInteger($("#inputEditFontSize").val())) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            if (jQuery.trim($("#inputEditFontSize").val()) < 1 || jQuery.trim($("#inputEditFontSize").val()) > 300) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).css({ "font-size": jQuery.trim($("#inputEditFontSize").val()) + "px" });
        };
        function validateValue(cad) {
            for (var i = 0; i < cad.length; i++) {
                if (cad[i] == "'" || cad[i] == '"' || cad[i] == "<" || cad[i] == ">") return true;
            }
            return false;
        };
        function inputEditValueOut() {
            //var RegExPattern = /[\'\"]$/;
            if (validateValue(jQuery.trim($("#inputEditValue").val()))) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).text(jQuery.trim($("#inputEditValue").val()));
        };
        function inputEditValuePress(e) {
            if (e.keyCode != 13) return;
            if (validateValue(jQuery.trim($("#inputEditValue").val()))) {
                $(this).css("background-color", "rgb(255,179,179)");
                return;
            }
            $(this).css("background-color", "white");
            $("#" + $($("#objectPropertys table")[0]).attr("name")).text(jQuery.trim($("#inputEditValue").val()));
        };
        function BuilPropertys() {
            if (!$("#propertyes").hasClass('showPropertyes')) return;
            $("#objectPropertys").remove();
            if ($(".objectSelected").length == 0) {
                BuildTablePropertyes($($("#editorTemplateWorkArea")).attr("id"));
                //                $($("#objectPropertys table")[0]).append("<tr><td><span>Nombre</span></td><td class='propertyValue'><input id='inputEditName' class='inputText' type='text' value='" + $("#editorTemplateWorkArea").attr("name") + "'/></td></tr>");
                //                $("#inputEditName").bind({
                //                    focusout: inputEditNameOut,
                //                    keypress: inputEditNamePress
                //                });
                $($("#objectPropertys table")[0]).append("<tr><td><span>Anchura</span></td><td class='propertyValue'><input id='inputEditWidth' class='inputText' type='text' value='" + ($("#editorTemplateWorkArea").width()) + "'/></td></tr>");
                $("#inputEditWidth").bind({
                    focusout: inputEditWidthOut,
                    keypress: inputEditWidthPress
                });
                $($("#objectPropertys table")[0]).append("<tr><td><span>Altura</span></td><td class='propertyValue'><input id='inputEditHeight' class='inputText' type='text' value='" + ($("#editorTemplateWorkArea").height()) + "'/></td></tr>");
                $("#inputEditHeight").bind({
                    focusout: inputEditHeightOut,
                    keypress: inputEditHeightPress
                });
                /*$($("#objectPropertys table")[0]).append("<tr><td>Resolución</td><td class='propertyValue'><input type='text' value='"+(72)+"'/></td></tr>");*/
                $("#objectPropertys input").keypress(function (event) {
                    if (event.keyCode == 13) return false;
                });
                return;
            }
            BuildTablePropertyes($(element).attr("id"));
            $($("#objectPropertys table")[0]).append("<tr><td><span>Identificador</span></td><td class='propertyValue'><input id='inputEditIdentifier' class='inputText' type='text' value='" + element.attr("name") + "'/></td></tr>");
            $("#inputEditIdentifier").bind({
                focusout: inputEditIdentifierOut,
                keypress: inputEditIdentifierPress
            });
            $($("#objectPropertys table")[0]).append("<tr><td><span>X</span></td><td class='propertyValue'><input id='inputEditX' type='text' class='inputText' value='" + (element.position().left - $($("#editorTemplateWorkArea")[0]).position().left) + "'/></td></tr>");
            $("#inputEditX").bind({
                focusout: inputEditXOut,
                keypress: inputEditXPress
            });
            $($("#objectPropertys table")[0]).append("<tr><td><span>Y</span></td><td class='propertyValue'><input id='inputEditY' type='text' class='inputText' value='" + (element.position().top - $($("#editorTemplateWorkArea")[0]).position().top) + "'/></td></tr>");
            $("#inputEditY").bind({
                focusout: inputEditYOut,
                keypress: inputEditYPress
            });
            $($("#objectPropertys table")[0]).append("<tr><td><span>Anchura</span></td><td class='propertyValue'><input id='inputEditWidth1' class='inputText' type='text' value='" + (element.width()) + "'/></td></tr>");
            $("#inputEditWidth1").bind({
                focusout: inputEditWidth1Out,
                keypress: inputEditWidth1Press
            });
            $($("#objectPropertys table")[0]).append("<tr><td><span>Altura</span></td><td class='propertyValue'><input id='inputEditHeight1' class='inputText' type='text' value='" + (element.height()) + "'/></td></tr>");
            $("#inputEditHeight1").bind({
                focusout: inputEditHeight1Out,
                keypress: inputEditHeight1Press
            });
            $($("#objectPropertys table")[0]).append("<tr><td><span>Color de fondo</span></td><td class='propertyValue'><input id='inputEditBackColor' class='inputText' type='text' value='" + (element.css("background-color")) + "'/></td></tr>");
            $("#inputEditBackColor").bind({
                focusin: inputEditBackColorIn,
                focusout: inputEditBackColorOut,
                keypress: inputEditBackColorPress
            });
            if (element.hasClass("Text")) {
                var selectFonts = "<select id='selectEditFont' style='height:17px;'>";
                for (var i = 0; i < fuentes.length; i++) {
                    if (fuentes[i] == element.css("font-family"))
                        selectFonts += "<option selected='selected'>" + fuentes[i] + "</option>";
                    else
                        selectFonts += "<option>" + fuentes[i] + "</option>";
                }
                selectFonts += "</select>";
                //$($("#objectPropertys table")[0]).append("<tr><td>Fuente</td><td class='propertyValue'><input id='inputEditFont' type='text' class='inputText' value='"+(element.css("font-family"))+"'/></td></tr>");
                $($("#objectPropertys table")[0]).append("<tr><td><span>Fuente</span></td><td class='propertyValue'>" + selectFonts + "</td></tr>");
                $("#selectEditFont").bind({
                    change: selectEditFont
                });
                /*$("#inputEditFont").bind({
                focusout: inputEditFontOut,
                keypress: inputEditFontPress
                });*/
                //estilo
                var style = getStyle(element);
                var styles = ["Normal", "Cursiva", "Negrita", "Negrita cursiva"];
                var optionsstyle = "";
                for (a = 0; a < styles.length; a++) {
                    var aux = "";
                    if (styles[a] == style) aux = " selected='selected'";
                    optionsstyle += "<option" + aux + ">" + styles[a] + "</option>";
                }
                //alert(style+" "+optionsstyle);
                $($("#objectPropertys table")[0]).append("<tr><td><span>Estilo</span></td><td class='propertyValue'><select id='selectEditFontStyle' style='height:17px;'>" + optionsstyle + "</select></td></tr>");
                $("#selectEditFontStyle").bind({
                    change: selectEditFontStyle
                });
                //estilo
                //decoration
                decoration = getDecoration(element);
                var decorations = ["Ninguna", "Tachada", "Subrayada"];
                optionsdecoration = "";
                for (a = 0; a < decorations.length; a++) {
                    var aux = "";
                    if (decorations[a] == decoration) aux = " selected='selected'";
                    optionsdecoration += "<option" + aux + ">" + decorations[a] + "</option>";
                }

                $($("#objectPropertys table")[0]).append("<tr><td><span>Decoración</span></td><td class='propertyValue'><select id='selectEditFontDecoration' style='height:17px;'>" + optionsdecoration + "</select></td></tr>");
                $("#selectEditFontDecoration").bind({
                    change: selectEditFontDecoration
                });
                //decoration
                var selectTrasform = "<select id='inputEditTransform' style='height:17px;'>";
                if (element.css("text-transform") == "lowercase")
                    selectTrasform += "<option name='none'>Ninguna</option><option selected='selected' name='lowercase'>Minúsculas</option><option name='uppercase'>Mayúsculas</option>";
                else {
                    if (element.css("text-transform") == "uppercase")
                        selectTrasform += "<option name='none'>Ninguna</option><option name='lowercase'>Minúsculas</option><option selected='selected' name='uppercase'>Mayúsculas</option>";
                    else
                        selectTrasform += "<option selected='selected' name='none'>Ninguna</option><option name='lowercase'>Minúsculas</option><option name='uppercase'>Mayúsculas</option>";
                }
                selectTrasform += "</select>";
                $($("#objectPropertys table")[0]).append("<tr><td><span>Transformación</span></td><td class='propertyValue'>" + selectTrasform + "</td></tr>");
                $("#inputEditTransform").bind({
                    change: inputEditTransform
                });
                /*
                $($("#objectPropertys table")[0]).append("<tr><td>Grosor</td><td class='propertyValue'><input id='inputEditFontWeight' type='text' class='inputText' value='"+(element.css("font-weight"))+"'/></td></tr>");
                $("#inputEditFontWeight").bind({
                focusout: inputEditFontWeightOut,
                keypress: inputEditFontWeightPress
                });*/
                /*var selectColor="<select>";
                for(i=0;i<colores.length;i+=2){
                selectColor+="<option name='"+colores[i+1]+"'>"+colores[i]+"</option>";	
                }
                selectColor+="</select>";*/
                $($("#objectPropertys table")[0]).append("<tr><td class='propertyName'><span>Color fuente</span></td><td class='propertyValue'><input id='inputEditForeColor' type='text' class='inputText' value='" + (element.css("color")) + "'/></td></tr>");
                $("#inputEditForeColor").bind({
                    focusin: inputEditForeColorIn,
                    focusout: inputEditForeColorOut,
                    keypress: inputEditForeColorPress
                });
                //$($("#objectPropertys table")[0]).append("<tr><td class='propertyName'>Color fuente</td><td class='propertyValue'>"+selectColor+"</td></tr>");
                $($("#objectPropertys table")[0]).append("<tr><td class='propertyName'><span>Tamaño de fuente</span></td><td class='propertyValue'><input id='inputEditFontSize' type='text' class='inputText' value='" + (element.css("font-size").substr(0, element.css("font-size").length - 2)) + "'/></td></tr>");
                $("#inputEditFontSize").bind({
                    focusout: inputEditFontSizeOut,
                    keypress: inputEditFontSizePress
                });
                $($("#objectPropertys table")[0]).append("<tr><td class='propertyName'><span>Valor</span></td><td class='propertyValue'><input id='inputEditValue' type='text' class='inputText' value='" + (element.text()) + "'/></td></tr>");
                $("#inputEditValue").bind({
                    focusout: inputEditValueOut,
                    keypress: inputEditValuePress
                });
            }
            $("#objectPropertys input").keypress(function (event) {
                if (event.keyCode == 13) return false;
            });
        };
        function getDecoration(e) {
            if (e.css("text-decoration") == "line-through") return "Tachada";
            if (e.css("text-decoration") == "underline") return "Subrayada";
            return "Ninguna";
        };
        function setDecoration(e, value) {
            if (value == "Tachada") {
                e.css({ "text-decoration": "line-through" });
                return;
            }
            if (value == "Subrayada") {
                e.css({ "text-decoration": "underline" });
                return;
            }
            if (value == "Ninguna") {
                e.css({ "text-decoration": "none" });
                return;
            }
        };
        function getStyle(e) {
            if (e.css("font-weight") == "700" && e.css("font-style") == "italic") return "Negrita cursiva";
            if (e.css("font-weight") == "700") return "Negrita";
            if (e.css("font-style") == "italic") return "Cursiva";
            return "Normal";
        };
        function setStyle(e, value) {
            if (value == "Negrita cursiva") {
                e.css({ "font-style": "italic" });
                e.css({ "font-weight": "bold" });
                return;
            }
            if (value == "Negrita") {
                e.css({ "font-style": "normal" });
                e.css({ "font-weight": "bold" });
                return;
            }
            if (value == "Cursiva") {
                e.css({ "font-style": "italic" });
                e.css({ "font-weight": "normal" });
                return;
            }
            if (value == "Normal") {
                e.css({ "font-style": "normal" });
                e.css({ "font-weight": "normal" });
                //e.css({"text-decoration": "none"});
                return;
            }
        };
        function ClickSendToBack() {
            if ($(".objectSelected").length > 0) {
                var index = $($(".objectSelected")[0]).css("z-index");
                var face = "reverse";
                if ($("#designerFace").hasClass('anverseDocument')) {
                    face = "anverse";
                }
                for (ii = 0; ii < $("#editorTemplateWorkArea div." + face).length; ii++) {
                    var objectIndex = $($("#editorTemplateWorkArea div." + face)[ii]).css("z-index");
                    if (Number(objectIndex) < Number(index))
                        $($("#editorTemplateWorkArea div." + face)[ii]).css({ "z-index": (Number(objectIndex) + Number(1)) + "" });
                }
                $($(".objectSelected")[0]).css({ "z-index": 1 });
            }
        };
        function ClickSaveButton() {
            if (parseInt($(ClientIDs.IsNew).val()) == 1 && $(ClientIDs.DocumentName).val() == "") {
                $("#dialogContainer").append("<div id=\"dialog\" title=\"Guardar como:\"><p><span>Nombre:</span><br/><input type=\"text\" id=\"NewTemplateName\" style=\"width:100%;\" onkeypress=\"return event.keyCode != 13;\"/></p></div>");
                $("#dialog").dialog({
                    bgiframe: true,
                    height: 140,
                    modal: true,
                    buttons: {
                        'Cancelar': function () {
                            $(this).dialog('close');
                            $("#dialog").remove();
                        },
                        'Guardar': function () {
                            if (!ValidateName()) {
                                $("#dialogContainer").append("<div id=\"dialog1\" title=\"Error\"><p>No pueden haber campos incorrectos.</p></div>");
                                $("#dialog1").dialog({
                                    bgiframe: true,
                                    height: 140,
                                    buttons: {
                                        'Aceptar': function () {
                                            $(this).dialog('close');
                                            $("#dialog1").remove();
                                        }
                                    }
                                });
                                return;
                            }
                            var name = $("#NewTemplateName").val();
                            var exist = false;
                            $.ajax({
                                url: "../../Services/ServiceQuery.asmx/existTemplateName",
                                async: false,
                                data: "{templateName:'" + name + "'}",
                                success: function (msg) {
                                    if (msg.d) {
                                        $("#dialogContainer").append("<div id=\"dialog\" title=\"Error\"><p>Ya existe una plantilla con nombre '" + name + "'.</p></div>");
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
                                        exist = true;
                                    }
                                }
                            });
                            if (exist) return;
                            Save(name);
                            $(this).dialog('close');
                            $("#dialog").remove();
                        }
                    }
                });
                $("#NewTemplateName").keyup(function () {
                    ValidateName();
                });
            }
            else
                Save($(ClientIDs.DocumentName).val());
        };
        function ValidateName() {
            var RegExPattern = /^([a-zA-Z0-9á-úÁ-Ú]|_|-| )+$/;
            if (!RegExPattern.test(jQuery.trim($("#NewTemplateName").val())) || $("#NewTemplateName").val().length > 50) {
                $("#NewTemplateName").css({ "background-color": "rgb(255,179,179)" });
                return false;
            }
            else {
                $("#NewTemplateName").css({ "background-color": "white" });
                return true;
            }
        };
        function Replace(cad, oldChar, newChar) {
            var resultCad = "";
            for (var i = 0; i < cad.length; i++) {
                if (cad[i] == oldChar) resultCad += newChar;
                else resultCad += cad[i];
            }
            return resultCad;
        };
        function RgbToHexColor(rgbColor) {
            if (rgbColor.toLowerCase() == "transparent") return "transparent";
            if (!validateColor(rgbColor)) return "transparent";
            var c = rgbColor.split("(")[1];
            c = c.split(")")[0];
            c = c.split(",");
            return "#" + toHex(c[0]) + toHex(c[1]) + toHex(c[2]);
        };
        function toHex(N) {
            if (N == null || N == "") return "00";
            N = parseInt(N);
            if (N == 0 || isNaN(N)) return "00";
            N = Math.max(0, N);
            N = Math.min(N, 255);
            N = Math.round(N);
            return "0123456789ABCDEF".charAt((N - N % 16) / 16) + "0123456789ABCDEF".charAt(N % 16);
        }
        function Save(name) {
            var anverse = "";
            var reverse = "";
            for (var i = 0; i < $("#editorTemplateWorkArea div").length; i++) {
                var clas = "";
                if ($($("#editorTemplateWorkArea div")[i]).hasClass("Text")) clas = "Text";
                if ($($("#editorTemplateWorkArea div")[i]).hasClass("Image")) clas = "Image";
                var fontStyle = "regular";
                if ($($("#editorTemplateWorkArea div")[i]).css("font-style") == "italic")
                    fontStyle = "italic";
                if ($($("#editorTemplateWorkArea div")[i]).css("font-weight") == "700") {
                    if (fontStyle != "regular") fontStyle += ", ";
                    else fontStyle = "";
                    fontStyle += "bold";
                }
                if ($($("#editorTemplateWorkArea div")[i]).css("text-decoration") == "underline") {
                    if (fontStyle != "regular") fontStyle += ", ";
                    else fontStyle = "";
                    fontStyle += "underline";
                }
                if ($($("#editorTemplateWorkArea div")[i]).css("text-decoration") == "line-through") {
                    if (fontStyle != "regular") fontStyle += ", ";
                    else fontStyle = "";
                    fontStyle += "strikeout";
                }
                var textTransform = "none";
                if ($($("#editorTemplateWorkArea div")[i]).css("text-transform") == "lowercase")
                    textTransform = "tolowercase";
                if ($($("#editorTemplateWorkArea div")[i]).css("text-transform") == "uppercase")
                    textTransform = "touppercase";
                var object = "{Id:'" + $($("#editorTemplateWorkArea div")[i]).attr("id") + "'"
                + ", Index:" + ($($("#editorTemplateWorkArea div")[i]).css("z-index") - 1)
                + ", ValueField:'" + $($("#editorTemplateWorkArea div")[i]).attr("name") + "'"
                + ", Location:{X:" + parseInt(($($("#editorTemplateWorkArea div")[i]).position().left - $($("#editorTemplateWorkArea")[0]).position().left)) + ",Y:" + parseInt(($($("#editorTemplateWorkArea div")[i]).position().top - $($("#editorTemplateWorkArea")[0]).position().top)) + "}"
                + ", Size:{Height:" + parseInt($($("#editorTemplateWorkArea div")[i]).css("height").substr(0, $($("#editorTemplateWorkArea div")[i]).css("height").length - 2)) + ",Width:" + parseInt($($("#editorTemplateWorkArea div")[i]).css("width").substr(0, $($("#editorTemplateWorkArea div")[i]).css("width").length - 2)) + "}"
                + ", BackgroundColor:'" + RgbToHexColor($($("#editorTemplateWorkArea div")[i]).css("background-color")) + "'"
                + ", TemplateObjectType:'" + clas + "'"
                + ", DefaultValue:'" + $($("#editorTemplateWorkArea div")[i]).text() + "'"
                + ", Font:'" + Replace($($("#editorTemplateWorkArea div")[i]).css("font-family"), ",", " ") + "'"
                + ", FontStyle:'" + fontStyle + "'"
                + ", TextTrasform:'" + textTransform + "'"
                + ", ForeColor:'" + RgbToHexColor($($("#editorTemplateWorkArea div")[i]).css("color")) + "'"
                + ", FontSize:'" + ($($("#editorTemplateWorkArea div")[i]).css("font-size").substr(0, $($("#editorTemplateWorkArea div")[i]).css("font-size").length - 2)) + "'}";

                if ($($("#editorTemplateWorkArea div")[i]).hasClass("anverse")) {
                    if (anverse != "") anverse += ",";
                    anverse += object;
                }
                if ($($("#editorTemplateWorkArea div")[i]).hasClass("reverse")) {
                    if (reverse != "") reverse += ",";
                    reverse += object;
                }
            }

            var templateInfo = "{Size:{Height:" + $("#editorTemplateWorkArea").height() + ",Width:" + $("#editorTemplateWorkArea").width() + "}, AnverseBackgroundColor:'" + RgbToHexColor("rgb(255,255,255)") + "', AnverseBackgroundImage:[], ReverseBackgroundColor:'" + RgbToHexColor("rgb(255,255,255)") + "', ReverseBackgroundImage:[], Anverse:[" + anverse + "], Reverse:[" + reverse + "]}";
            var url = "../../Services/ServiceQuery.asmx/SaveTemplateEx";

            $.ajax({
                url: url,
                data: "{templateInfo:" + templateInfo + ", documentName:'" + name + "', documentType:'" + $(ClientIDs.DocumentType).val() + "'}",
                success: function (msg) {
                    $("#dialogContainer").append("<div id=\"dialog1\" title=\"Atención\"><p>Los cambios fueron guardados correctamente.</p></div>");
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
                    $(ClientIDs.IsNew).val("0");
                    documentName = name;
                }
            });
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
        function JSonColorToHexColor(jsoncolor) {
            if (jsoncolor.Name == "Transparent") return "transparent";
            return "rgb(" + jsoncolor.R + "," + jsoncolor.G + "," + jsoncolor.B + ")";
        };
        function Load() {
            //**********************************************************************
            if (Boolean($(ClientIDs.IsNew).val()) && $(ClientIDs.DocumentName).val() != "" && $(ClientIDs.DocumentType).val() != "") {
                $("#editorTemplateWorkArea").css({ "width": "300px", "height": "180px" });
                return;
            }
            var url = "../../Services/ServiceQuery.asmx/LoadTemplateInfo";
            var params = "{documentName:'" + $(ClientIDs.DocumentName).val() + "'}";
            if (Boolean($(ClientIDs.IsNew).val()) && $(ClientIDs.DocumentName).val() == "") {
                url = "../../Services/ServiceQuery.asmx/LoadTemplateInfoFromProductionLine";
                params = "{documentType:'" + $(ClientIDs.DocumentType).val() + "'}";
            }
            $.ajax({
                url: url,
                data: params,
                success: function (template) {
                    $("#editorTemplateWorkArea").css({ "width": template.d.Size.Width + "px", "height": template.d.Size.Height + "px" });

                    for (i = 0; i < template.d.Anverse.length; i++) {
                        var otherAttrs = "";
                        var textvalue = "";
                        var jsonFontStyle = "";
                        var jsonTextTransform = "";
                        var fontStyle = "normal";
                        var fontWeight = "normal";
                        var textDecoration = "none";
                        var textTransform = "none";
                        if (template.d.Anverse[i].TemplateObjectTypeDescription == "Text") {
                            jsonFontStyle = template.d.Anverse[i].FontStyleDescription.split(",");
                            for (j = 0; j < jsonFontStyle.length; j++) {
                                var aux = jQuery.trim(jsonFontStyle[j]);
                                aux = aux.toLowerCase();
                                if (aux == "italic")
                                    fontStyle = "italic";
                                if (aux == "bold")
                                    fontWeight = "700";
                                if (aux == "underline")
                                    textDecoration = "underline";
                                if (aux == "strikeout")
                                    textDecoration = "line-through";
                            }
                            jsonTextTransform = jQuery.trim(template.d.Anverse[i].TextTransformDescription.toLowerCase());
                            if (jsonTextTransform == "tolowercase")
                                textTransform = "lowercase";
                            if (jsonTextTransform == "touppercase")
                                textTransform = "uppercase";
                            otherAttrs = " font-family:" + template.d.Anverse[i].Font
                            + "; font-style:" + fontStyle
                            + "; font-weight:" + fontWeight
                            + "; text-decoration:" + textDecoration
                            + "; text-transform:" + textTransform
                            + "; color:" + JSonColorToHexColor(template.d.Anverse[i].ForeColor)
                            + "; font-size:" + template.d.Anverse[i].FontSize + "px;";
                            textvalue = template.d.Anverse[i].DefaultValue;
                        }
                        var documentObject = "<div id='reportObject" + count
                        + "' name='" + template.d.Anverse[i].ValueField
                        + "' class='" + template.d.Anverse[i].TemplateObjectTypeDescription
                        + "' style='width:" + template.d.Anverse[i].Size.Width
                        + "px; height:" + template.d.Anverse[i].Size.Height
                        + "px; left:" + (Number(template.d.Anverse[i].Location.X) + Number($("#editorTemplateWorkArea").position().left))
                        + "px; top:" + (Number(template.d.Anverse[i].Location.Y) + Number($("#editorTemplateWorkArea").position().top))
                        + "px; background-color:" + JSonColorToHexColor(template.d.Anverse[i].BackgroundColor)
                        + "; z-index:" + (Number(template.d.Anverse[i].Index) + Number(1))
                        + ";" + otherAttrs + "'>" + textvalue + "</div>";

                        $("#editorTemplateWorkArea").append(documentObject);
                        $("#reportObject" + count).addClass('anverse');
                        if (template.d.Anverse[i].TemplateObjectTypeDescription == "Image") {
                            $("#reportObject" + count).bind({
                                mousedown: Down,
                                mouseenter: Enter,
                                mouseout: Out
                            });
                        }
                        else {
                            if (template.d.Anverse[i].TemplateObjectTypeDescription == "Text") {
                                $("#reportObject" + count).bind({
                                    mousedown: Down,
                                    mouseenter: Enter,
                                    mouseout: Out,
                                    dblclick: DblClick
                                });
                            }
                        }
                        count++;
                    }

                    for (i = 0; i < template.d.Reverse.length; i++) {
                        var otherAttrs = "";
                        var textvalue = "";
                        var jsonFontStyle = "";
                        var jsonTextTransform = "";
                        var fontStyle = "normal";
                        var fontWeight = "normal";
                        var textDecoration = "none";
                        var textTransform = "none";
                        if (template.d.Reverse[i].TemplateObjectTypeDescription == "Text") {
                            jsonFontStyle = template.d.Reverse[i].FontStyleDescription.split(",");
                            for (j = 0; j < jsonFontStyle.length; j++) {
                                var aux = jQuery.trim(jsonFontStyle[j]);
                                aux = aux.toLowerCase();
                                if (aux == "italic")
                                    fontStyle = "italic";
                                if (aux == "bold")
                                    fontWeight = "700";
                                if (aux == "underline")
                                    textDecoration = "underline";
                                if (aux == "strikeout")
                                    textDecoration = "line-through";
                            }
                            jsonTextTransform = jQuery.trim(template.d.Reverse[i].TextTransformDescription.toLowerCase());
                            if (jsonTextTransform == "tolowercase")
                                textTransform = "lowercase";
                            if (jsonTextTransform == "touppercase")
                                textTransform = "uppercase";
                            otherAttrs = " font-family:" + template.d.Reverse[i].Font
                            + "; font-style:" + fontStyle
                            + "; font-weight:" + fontWeight
                            + "; text-decoration:" + textDecoration
                            + "; text-transform:" + textTransform
                            + "; color:" + JSonColorToHexColor(template.d.Reverse[i].ForeColor)
                            + "; font-size:" + template.d.Reverse[i].FontSize + "px;";
                            textvalue = template.d.Reverse[i].DefaultValue;
                        }
                        var documentObject = "<div id='reportObject" + count
                        + "' name='" + template.d.Reverse[i].ValueField
                        + "' class='" + template.d.Reverse[i].TemplateObjectTypeDescription
                        + "' style='width:" + template.d.Reverse[i].Size.Width
                        + "px; height:" + template.d.Reverse[i].Size.Height
                        + "px; left:" + (Number(template.d.Reverse[i].Location.X) + Number($("#editorTemplateWorkArea").position().left))
                        + "px; top:" + (Number(template.d.Reverse[i].Location.Y) + Number($("#editorTemplateWorkArea").position().top))
                        + "px; background-color:" + JSonColorToHexColor(template.d.Reverse[i].BackgroundColor)
                        + "; z-index:" + (Number(template.d.Reverse[i].Index) + Number(1))
                        + ";" + otherAttrs + "'>" + textvalue + "</div>";

                        $("#editorTemplateWorkArea").append(documentObject);
                        $("#reportObject" + count).addClass('reverse');
                        if (template.d.Reverse[i].TemplateObjectTypeDescription == "Image") {
                            $("#reportObject" + count).bind({
                                mousedown: Down,
                                mouseenter: Enter,
                                mouseout: Out
                            });
                        }
                        else {
                            if (template.d.Reverse[i].TemplateObjectTypeDescription == "Text") {
                                $("#reportObject" + count).bind({
                                    mousedown: Down,
                                    mouseenter: Enter,
                                    mouseout: Out,
                                    dblclick: DblClick
                                });
                            }
                        }
                        count++;
                    }
                    $("#editorTemplateWorkArea .reverse").addClass('hiddenInWorkArea');
                }
            });

        };
        function ClickDesignerArea(e) {
            if ($(".buttonSelected").length > 0) {
                var deltaX = $("#editorTemplateWorkArea").offset().left - $("#editorTemplateWorkArea").position().left;
                var deltaY = $("#editorTemplateWorkArea").offset().top - $("#editorTemplateWorkArea").position().top;
                var index = $("#editorTemplateWorkArea div.reverse").length;
                var face = "reverse";
                if ($("#designerFace").hasClass('anverseDocument')) {
                    face = "anverse";
                    index = $("#editorTemplateWorkArea div.anverse").length;
                }
                index++;
                if ($(".buttonSelected")[0].id == "inputImage") {
                    var temp = "<div id='reportObject" + count + "' name='' class='Image' style='width:100px;height:100px;z-index:" + (index) + ";'></div>";
                    //elements.push(temp);
                    //Method();
                    $("#editorTemplateWorkArea").append(temp);
                    $("#reportObject" + count).css({ left: (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) + "px", top: (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0)) + "px" });

                    $("#reportObject" + count).addClass(face);
                    $("#reportObject" + count).bind({
                        mousedown: Down,
                        mouseenter: Enter,
                        mouseout: Out
                    });
                }
                if ($(".buttonSelected")[0].id == "inputTextt") {
                    var temp = "<div id='reportObject" + count + "' name='' class='Text' style='font-family:Arial;font-size:12px;width:100px;height:20px;color:#000000;z-index:" + (index) + ";'>Escriba texto</div>";
                    //elements.push(temp);
                    //Method();
                    $("#editorTemplateWorkArea").append(temp);
                    $("#reportObject" + count).css({ left: (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) + "px", top: (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0)) + "px" });

                    $("#reportObject" + count).addClass(face);
                    $("#reportObject" + count).bind({
                        mousedown: Down,
                        mouseenter: Enter,
                        mouseout: Out,
                        dblclick: DblClick
                    });
                }
                count++;
            }
            if (enter == 0) {
                $("#editorTemplateWorkArea div").css({ 'border-width': '1px', 'border-color': '#8EB5CC', 'border-style': 'solid' });
                $("#editorTemplateWorkArea div").removeClass('objectSelected');
            }
        };
        function ClickToolBox() {
            $("#templateEditorTableToolBox td").removeClass('buttonSelected');
            $(this).addClass('buttonSelected');
        };
        function getOption(elem, e) {
            var xx = elem.position().left;
            var yy = elem.position().top;
            var deltaX = $("#editorTemplateWorkArea").offset().left - $("#editorTemplateWorkArea").position().left;
            var deltaY = $("#editorTemplateWorkArea").offset().top - $("#editorTemplateWorkArea").position().top;
            if (Number(xx) + Number(elem.width()) - tolerancia <= (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0))) return 1;
            if (Number(yy) + Number(elem.height()) - tolerancia <= (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0))) return 2;
            if (Number(xx) + Number(tolerancia) >= (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0))) return 3;
            if (Number(yy) + Number(tolerancia) >= (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0))) return 4;

            return 5;
        };
        function getOption1(e) {
            var deltaX = $("#editorTemplateWorkArea").offset().left - $("#editorTemplateWorkArea").position().left;
            var deltaY = $("#editorTemplateWorkArea").offset().top - $("#editorTemplateWorkArea").position().top;
            if (Number($("#editorTemplateWorkArea").position().left) + Number($("#editorTemplateWorkArea").width()) - tolerancia <= (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) && Number($("#editorTemplateWorkArea").position().left) + Number($("#editorTemplateWorkArea").width()) >= (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0))) return 6;
            if (Number($("#editorTemplateWorkArea").position().top) + Number($("#editorTemplateWorkArea").height()) - tolerancia <= (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0)) && Number($("#editorTemplateWorkArea").position().top) + Number($("#editorTemplateWorkArea").height()) >= (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0))) return 7;
        };
        function DblClick(e) {
            var text = $(this).text();
            $(this).empty();
            //$(this).append("<input type='text' id='txtTemp' value='"+text+"'/>");
            $(this).append("<textarea id='txtTemp' style='height:100%; width:100%; overflow:hidden;'>" + text + "</textarea>");
        };
        function Down(e) {

            if (downProp == 1) return;
            if ($(".buttonSelected").length > 0) return;
            var deltaX = $("#editorTemplateWorkArea").offset().left - $("#editorTemplateWorkArea").position().left;
            var deltaY = $("#editorTemplateWorkArea").offset().top - $("#editorTemplateWorkArea").position().top;
            x = (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0));
            y = (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0));
            //x=e.clientX;
            //y=e.clientY;
            element = $(this);
            //alert(element.offset().left+" "+element.offset().top+" "+element.position().left+" "+element.position().top);
            //if(enter == 0)
            $("#editorTemplateWorkArea div").css({ 'border-width': '1px', 'border-color': '#8EB5CC', 'border-style': 'solid' });
            $("#editorTemplateWorkArea div").removeClass('objectSelected');
            $(this).css({ 'border-width': '1px', 'border-color': '#333333', 'border-style': 'dashed' });
            $(this).addClass('objectSelected');
            BuilPropertys();
            selected = 1;
            option = getOption(element, e);
        };
        function DownWorkArea(e) {
            if (downProp == 1) return;
            if (selected) return;
            var deltaX = $("#editorTemplateWorkArea").offset().left - $("#editorTemplateWorkArea").position().left;
            var deltaY = $("#editorTemplateWorkArea").offset().top - $("#editorTemplateWorkArea").position().top;
            x = (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0));
            y = (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0));
            option = getOption1(e);
            $("#editorTemplateWorkArea div").removeClass('objectSelected');
            BuilPropertys();
        };
        var designerPosition = null;
        var designerWidth = 0;
        var designerHeight = 0;
        function DownPropertyes(e) {
            //alert($($("#objectPropertys table")[0]).attr("name"));
            var xx = $("#objectPropertys").position().left;
            var yy = $("#objectPropertys").position().top;
            designerPosition = $("#templateEditorDesignerArea").position();
            designerWidth = $("#templateEditorDesignerArea").width();
            designerHeight = $("#templateEditorDesignerArea").height();
            var deltaX = $("#editorTemplateWorkArea").offset().left - $("#editorTemplateWorkArea").position().left;
            var deltaY = $("#editorTemplateWorkArea").offset().top - $("#editorTemplateWorkArea").position().top;
            if ((xx < (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0))) && (Number(xx) + Number($("#objectPropertys").width()) > (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0))) && (yy < (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0))) && (Number(yy) + Number($("#objectPropertys").height()) > (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0)))) {
                downProp = 1;
                x = (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0));
                y = (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0));
                option = 8;
            }
        };
        function UpPropertyes(e) {
            option = 0;
            downProp = 0;
        };
        function UpWorkArea(e) {
            option = 0;
        };
        function Move(e) {
            //alert(e.pageX+" "+e.pageY+"  "+e.clientX+" "+e.clientY+"  "+$("#editorTemplateWorkArea").position().left+"  "+$("#editorTemplateWorkArea").offset().left);
            drag = selected;
            if ($("#txtTemp").length > 0) return;
            var deltaX = $("#editorTemplateWorkArea").offset().left - $("#editorTemplateWorkArea").position().left;
            var deltaY = $("#editorTemplateWorkArea").offset().top - $("#editorTemplateWorkArea").position().top;
            if ($(".buttonSelected").length > 0) {
                if ($("#tempRectangle").length == 0) {
                    if ($(".buttonSelected")[0].id == "inputImage") {
                        $("#editorTemplateWorkArea").append("<div id='tempRectangle' class='tempRectangle'></div>");
                    }
                    if ($(".buttonSelected")[0].id == "inputTextt") {
                        $("#editorTemplateWorkArea").append("<div id='tempRectangle' class='tempRectangleText'>Escriba texto</div>");
                    }
                }
                else {
                    $("#tempRectangle").css({ left: (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) + "px", top: (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0)) + "px" });
                }
                return;
            }
            switch (getOption1(e)) {
                case 6: $("#editorTemplateWorkArea").css({ cursor: "e-resize" });
                    $('#designerFace').css({ cursor: "e-resize" });
                    break;
                case 7: $("#editorTemplateWorkArea").css({ cursor: "s-resize" });
                    $('#designerFace').css({ cursor: "s-resize" });
                    break;
                default: $("#editorTemplateWorkArea").css({ cursor: "default" });
                    $('#designerFace').css({ cursor: "default" });
                    break;
            }
            if (enter == 1) {
                switch (getOption(element_temp, e)) {
                    case 1: $("#editorTemplateWorkArea").css({ cursor: "e-resize" });
                        break;
                    case 2: $("#editorTemplateWorkArea").css({ cursor: "s-resize" });
                        break;
                    case 3: $("#editorTemplateWorkArea").css({ cursor: "e-resize" });
                        break;
                    case 4: $("#editorTemplateWorkArea").css({ cursor: "s-resize" });
                        break;
                    case 5: $("#editorTemplateWorkArea").css({ cursor: "move" });
                        break;
                }
                //alert(getOption(element_temp, e));
            }
            if (option == 0) return;
            var xx = 0;
            var yy = 0;
            if (selected == 1) {
                xx = element.position().left;
                yy = element.position().top;
            }
            switch (option) {
                case 1: var w = Number(element.width()) + Number((Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) - x);
                    element.css({ width: w + "px" });
                    BuilPropertys();
                    break;
                case 2: var h = Number(element.height()) + Number((Number(e.pageY) - ((deltaY > 0) ? deltaY : 0)) - y);
                    element.css({ height: h + "px" });
                    BuilPropertys();
                    break;
                case 3: var w = Number(element.width()) - Number((Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) - x);
                    element.css({ width: w + "px" });
                    xx = Number(xx) + Number((Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) - x);
                    element.css({ left: xx + "px" });
                    BuilPropertys();
                    break;
                case 4: var h = Number(element.height()) - Number((Number(e.pageY) - ((deltaY > 0) ? deltaY : 0)) - y);
                    element.css({ height: h + "px" });
                    yy = Number(yy) + Number((Number(e.pageY) - ((deltaY > 0) ? deltaY : 0)) - y);
                    element.css({ top: yy + "px" });
                    BuilPropertys();
                    break;
                case 5: $("#editorTemplateWorkArea").css({ cursor: "move" });
                    xx = Number(xx) + Number((Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) - x);
                    yy = Number(yy) + Number((Number(e.pageY) - ((deltaY > 0) ? deltaY : 0)) - y);
                    element.css({ left: xx + "px", top: yy + "px" });
                    BuilPropertys();
                    break;
                case 6: var w = Number($("#editorTemplateWorkArea").width()) + Number((Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) - x);
                    //if(w<$("#templateEditorDesignerArea").width()){
                    $("#editorTemplateWorkArea").css({ width: w + "px" });
                    BuilPropertys();
                    //}
                    break;
                case 7: var h = Number($("#editorTemplateWorkArea").height()) + Number((Number(e.pageY) - ((deltaY > 0) ? deltaY : 0)) - y);
                    if (h < $("#templateEditorDesignerArea").height()) {
                        $("#editorTemplateWorkArea").css({ height: h + "px" });
                        BuilPropertys();
                    }
                    break;
                case 8: xx = $("#objectPropertys").position().left;
                    yy = $("#objectPropertys").position().top;
                    property_left = Number(xx) + Number((Number(e.pageX) - ((deltaX > 0) ? deltaX : 0)) - x);
                    property_top = Number(yy) + Number((Number(e.pageY) - ((deltaY > 0) ? deltaY : 0)) - y);
                    if (designerPosition.left > property_left || designerPosition.top > property_top || Number(property_left) + Number($("#objectPropertys").width()) > Number(designerPosition.left) + Number(designerWidth) || Number(property_top) + Number($("#objectPropertys").height()) > Number(designerPosition.top) + Number(designerHeight)) return;
                    $("#objectPropertys").css({ left: property_left + "px", top: property_top + "px" });
                    break;
            }
            x = (Number(e.pageX) - ((deltaX > 0) ? deltaX : 0));
            y = (Number(e.pageY) - ((deltaY > 0) ? deltaY : 0));
        };
        function Up(e) {
            selected = 0;
            option = 0;
            $(".buttonSelected").removeClass('buttonSelected');
            $("#tempRectangle").remove();

            if ($("#txtTemp").length > 0 && drag == 0) {
                var text = $("#txtTemp").val();
                var parent = $("#txtTemp").parent();
                parent.empty();
                parent.append(text);
            }
        };
        function Enter(e) {
            element_temp = $(this);
            enter = 1;
        };
        function Out(e) {
            enter = 0;
            $("#editorTemplateWorkArea").css({ cursor: "default" });
        };
        function RemoveObject() {
            //$(".objectSelected").remove();
            if ($(".objectSelected").length > 0) {
                var index = $($(".objectSelected")[0]).css("z-index");
                var face = "reverse";
                if ($("#designerFace").hasClass('anverseDocument')) {
                    face = "anverse";
                }
                for (ii = 0; ii < $("#editorTemplateWorkArea div." + face).length; ii++) {
                    var objectIndex = $($("#editorTemplateWorkArea div." + face)[ii]).css("z-index");
                    if (Number(objectIndex) > Number(index))
                        $($("#editorTemplateWorkArea div." + face)[ii]).css({ "z-index": (Number(objectIndex) - Number(1)) + "" });
                }
                $(".objectSelected").remove();
                $("#editorTemplateWorkArea div").removeClass('objectSelected');
                BuilPropertys();
            }
        };
        function Propertyes() {
            if ($("#propertyes").hasClass('showPropertyes')) {
                $("#propertyes").removeClass('showPropertyes');
                $("#objectPropertys").remove();
            }
            else {
                $("#propertyes").addClass('showPropertyes');
                BuilPropertys();
            }
        };
        function ClickSendToFront() {
            if ($(".objectSelected").length > 0) {
                var index = $($(".objectSelected")[0]).css("z-index");
                var face = "reverse";
                if ($("#designerFace").hasClass('anverseDocument')) {
                    face = "anverse";
                }
                for (ii = 0; ii < $("#editorTemplateWorkArea div." + face).length; ii++) {
                    var objectIndex = $($("#editorTemplateWorkArea div." + face)[ii]).css("z-index");
                    if (Number(objectIndex) > Number(index))
                        $($("#editorTemplateWorkArea div." + face)[ii]).css({ "z-index": (Number(objectIndex) - Number(1)) + "" });
                }
                $($(".objectSelected")[0]).css({ "z-index": $("#editorTemplateWorkArea div." + face).length });
            }
        };
        function ClickFlipHorizontal() {
            $("#editorTemplateWorkArea div").removeClass('objectSelected');
            BuilPropertys();
            var designerFace = $("#designerFace");
            if (designerFace.hasClass('anverseDocument')) {
                designerFace.removeClass('anverseDocument');
                designerFace.addClass('reverseDocument');
                designerFace.text("Reverso");
                $("#editorTemplateWorkArea div.anverse").addClass('hiddenInWorkArea');
                $("#editorTemplateWorkArea div.reverse").removeClass('hiddenInWorkArea');
            }
            else {
                if (designerFace.hasClass('reverseDocument')) {
                    designerFace.removeClass('reverseDocument');
                    designerFace.addClass('anverseDocument');
                    designerFace.text("Anverso");
                    $("#editorTemplateWorkArea div.anverse").removeClass('hiddenInWorkArea');
                    $("#editorTemplateWorkArea div.reverse").addClass('hiddenInWorkArea');
                }
            }
        };
        function ClickInputExit() {
            $(ClientIDs.ExitEditor).click();
        };
    };

    function debug($msg) {
        if (window.console && window.console.log)
            window.console.log($msg);
    };
})(jQuery);
