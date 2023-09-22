jQuery(function($) {
    var $_data = [{
            "id": 0,
            "name": "Product 0",
            "price": "$0"
        },
        {
            "id": 1,
            "name": "Product 1",
            "price": "$1"
        },
        {
            "id": 2,
            "name": "Product 2",
            "price": "$2"
        },
        {
            "id": 3,
            "name": "Product 3",
            "price": "$3"
        },
        {
            "id": 4,
            "name": "Product 4",
            "price": "$4"
        },
        {
            "id": 5,
            "name": "Product 5",
            "price": "$5"
        },
        {
            "id": 6,
            "name": "Product 6",
            "price": "$6"
        },
        {
            "id": 7,
            "name": "Product 7",
            "price": "$7"
        },
        {
            "id": 8,
            "name": "Product 8",
            "price": "$8"
        },
        {
            "id": 9,
            "name": "Product 9",
            "price": "$9"
        },
        {
            "id": 10,
            "name": "Product 10",
            "price": "$10"
        },
    ]

    // initiate the plugin
    var $_bsTable = $('#table')
    $_bsTable.bootstrapTable({
        data: $_data,
        columns: [{
                field: 'state',
                checkbox: true,
                printIgnore: true,
                //width: 64
            },
            {
                field: 'id',
                title: 'Product ID',
                sortable: true
            },
            {
                field: 'name',
                title: 'Product Name',
                sortable: true
            },
            {
                field: 'price',
                title: 'Price',
                sortable: true,
            },
            {
                field: 'tools',
                title: '<i class="fa fa-cog text-secondary-d1 text-130"></i>',
                formatter: formatTableCellActions,
                width: 140,
                align: 'center',
                printIgnore: true
            }
        ],
        icons: {
            columns: 'fa-th-list text-orange-d1',
            detailOpen: 'fa-plus text-blue',
            detailClose: 'fa-minus text-blue',
            export: 'fa-download text-blue',
            print: 'fa-print text-purple-d1',
            fullscreen: 'fa fa-expand',

            search: 'fa-search text-blue'
        },

        toolbar: "#table-toolbar",
        theadClasses: "bgc-white text-grey text-uppercase text-80",
        clickToSelect: true,

        checkboxHeader: true,
        search: true,
        searchAlign: "left",
        //showSearchButton: true,

        sortable: true,

        detailView: true,
        detailFormatter: "detailFormatter",

        pagination: true,
        paginationLoop: false,

        buttonsClass: "outline-default bgc-white btn-h-light-primary btn-a-outline-primary py-1 px-25 text-95",

        showExport: true,
        showPrint: true,
        showColumns: true,
        showFullscreen: true,


        mobileResponsive: true,
        checkOnInit: true,

        printPageBuilder: function(table) {
            var bsHref = $('link[rel=stylesheet][href*="/bootstrap.css"], link[rel=stylesheet][href*="/bootstrap.min.css"]').attr('href')
                //get bootstrap.css

            return '<html>\
                    <head>\
                      <link rel="stylesheet" type="text/css" href="' + bsHref + '">\
                      <title>Print Table</title>\
                    </head>\
                    <body class="container">\
                      <p>Printed on: ' + new Date() + '</p>\
                      <div>\
                        <table class="table table-bordered">' +
                table +
                '</table>\
                      </div>\
                    </body>\
                  </html>'
        }
    })

    function formatTableCellActions(value, row, index, field) {
        return '<div class="action-buttons">\
        <a class="text-blue mx-1" href="#">\
          <i class="fa fa-search-plus text-105"></i>\
        </a>\
        <a class="text-success mx-1" href="#">\
          <i class="fa fa-pencil-alt text-105"></i>\
        </a>\
        <a class="text-danger-m1 mx-1" href="#">\
          <i class="fa fa-trash-alt text-105"></i>\
        </a>\
      </div>'
    }


    // enable/disable 'remove' button
    var $removeBtn = $('#remove-btn')
    $_bsTable
        .on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function() {
            $removeBtn.prop('disabled', !$_bsTable.bootstrapTable('getSelections').length)
        })

    // remove an item
    $removeBtn.on('click', function() {
        var ids = $.map($_bsTable.bootstrapTable('getSelections'), function(row) {
            return row.id
        })

        $_bsTable.bootstrapTable('remove', {
            field: 'id',
            values: ids
        })

        $removeBtn.prop('disabled', true)
    })


    // change caret of "X" rows per page button
    $('.fixed-table-pagination .caret').addClass('fa fa-caret-down')
    $_bsTable.on('page-change.bs.table', function() {
        $('.fixed-table-pagination .caret').addClass('fa fa-caret-down')
    })

})