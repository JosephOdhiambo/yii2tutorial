$(document).on("click", ".fc-day", function() {
    var date = $(this).data("date");
    console.log(date);
    $.get("index.php?r=events%2Fcreate", {"date":date}, function(data){
        $("#modal").modal("show")
            .find("#modalContent")
            .html(data);
    });
});


$("#modalButton").click(function (){
//get the click event of the create button
    $("#modal").modal("show")
        .find("#modalContent")
        .load($(this).attr("value"));
});