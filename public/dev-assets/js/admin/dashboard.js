$(document).ready(function() {
   $(".delete-button").on("click",(e)=>{
       var info_id = e.target.getAttribute("data-info")
       $("#delete_button").on("click",(event)=>{
            $.ajax({
                method: "GET",
                url: "delete-info/" + info_id,
                success: (result) => {
                    location.reload();
                },
                error: (error) => {

                }
            });
       });
   });
   $(".lock-button").on("click",(e)=>{
    var info_id = e.target.getAttribute("data-info")
    var stage = e.target.getAttribute("data-stage");

    (stage == 1) ? $('.title-text').html("Unlock Template") : $('.title-text').html("Lock Template");
    (stage == 1) ? $('.body-text').html("Are you sure you want to remove lock the template user?") : $('.body-text').html("Are you sure you want to lock the template user?");
    $("#lock_button").on("click",(event)=>{
         $.ajax({
             method: "GET",
             url: "lock-ip/" + info_id,
             success: (result) => {
                 location.reload();
             },
             error: (error) => {

             }
         });
    });
});
});
