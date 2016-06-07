$().ready(function() {    
    $("#exportMe").on('click', function (event) 
    {
        var reportName = $("#exportName").val() + "export.csv";
        exportTableToCSV.apply(this, [$('#jmTable'), reportName]);
    
    });
    if ( $( "#jmTable" ).length ) 
    {
        $('#jmTable').DataTable({
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25
        });
    }
})
jQuery.fn.exists = function(){return this.length>0;}
function exportTableToCSV($table, filename) {

        var $rows = $table.find('tr:has(td),tr:has(th)'),           
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character
            colDelim = '","',
            rowDelim = '"\r\n"',
            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td,th');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text();

                    return text.replace('"', '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"',

            // Data URI
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);
            
            //csvData = encodeURIComponent(csv);
            console.log(csvData);
            //location.href='data:application/download,' + csvData;
            $(this)
            .attr({
            'download': filename,
                'href': csvData,
                'target': '_blank'
        });
    }