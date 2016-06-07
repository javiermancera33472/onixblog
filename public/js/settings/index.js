 $().ready(function(){
    $('#app_value').datetimepicker();
    $("#closeMe").click(function(){ 
        window.location = '/settings';
    });
 });
