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



$(document).ready(function() {
    // Click event handler for anchor tags with title="Update"
    $("tbody a[title='Update']").on("click", function(event) {
        var dataKey = $(this).closest("tr").data("key");
        console.log("data-key: " + dataKey);
        event.preventDefault();

        // Construct the URL
        var updateUrl = 'index.php?r=companies%2Fupdate&company_id=' + dataKey;

        // Open the Bootstrap modal
        $('#modalCompanies').modal('show');

        // Load the form content into the card
        $('#modalCompanies .modal-body').load(updateUrl, function() {
            // Optional callback function after the content is loaded
            // For example, you can initialize form behavior here
        });
    });
});



