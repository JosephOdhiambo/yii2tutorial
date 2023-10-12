$("#modalButton").click(function (){
//get the click event of the create button
    $("#modal").modal("show")
        .find("#modalContent")
        .load($(this).attr("value"));
});