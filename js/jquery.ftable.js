(function($) {
    $.fn.filteredTable = function() {
        var filterBox = $("#filterBox");
        var filterButton = $("#filterButton");
        var listPager = $("#listPager");
        var table = this;
        return this.each(function() {
            filterBox.keyup(Filter);
            filterButton.click(CancelFilter);
            Filter();
        });
        function Filter() {
            LoadPage(1, filterBox.val());
        }
        function CancelFilter() {
            if (filterBox.val() != "") {
                filterBox.val('');
                Filter();
            }
        }
        function BuildPager(filter, activePage) {
            $.ajax({
                type: "POST",
                url: "Services/FilteredTableService.asmx/GetTotal",
                data: "{filter:'" + filter + "'}",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(msg) {
                    
                    var total = Math.ceil((msg.d) / 5);
                    var prev = activePage - 1;
                    var next = activePage + 1;
   
                    listPager.empty();

                    listPager.append('<span class="activePage">' + activePage + '</span>');

                    if (prev > 0) {
                        listPager.prepend('<a href="#" class="pageButton" rel="' + prev + '">' + prev + '</a>');
                        if (prev > 1) {
                            if ((prev - 1) != 1)
                                listPager.prepend('...');
                            listPager.prepend('<a href="#" class="pageButton" rel="1">1</a>');
                        }
                    }
                    if (next <= total) {
                        listPager.append('<a href="#" class="pageButton" rel="' + next + '">' + next + '</a>');
                        if (next < total) {
                            if ((total - next) != 1)
                                listPager.append('...');
                            listPager.append('<a href="#" class="pageButton" rel="' + total + '">' + total + '</a>');
                        }
                    }
                    $("a.pageButton").bind({
                    click: function() {
                            LoadPage(parseInt($(this).attr("rel")), filter);
                        }
                    });
                }
            });
        }
        function LoadPage(number, filter) {
            BuildPager(filter, number);
            $.ajax({
                type: "POST",
                url: "Services/FilteredTableService.asmx/GetPersonasPage",
                data: "{page:" + number + ",filter:'" + filter + "'}",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(msg) {
                    var list = { table: msg.d };
                    table.setTemplateElement("template");
                    table.processTemplate(list);
                }
            });
        }
    }
})(jQuery);

$(document).ready(function() {
    $("#list").filteredTable(); 
});