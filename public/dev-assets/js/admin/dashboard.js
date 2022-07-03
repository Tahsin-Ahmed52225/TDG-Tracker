$(document).ready(function() {
   $(".delete-button").on("click",(e)=>{
       var info_id = e.target.getAttribute("data-info")
       $("#delete_button").on("click",(e)=>{
            $.ajax({
                method: "GET",
                url: "/api/comments/" + post_id,
                data: formData.serialize(),
                success: (result) => {
                    submitButton.html('Save');
                    $("#comment-errors-data").html('');
                    $("#comment-input").val('');
                    $("#successMessage").removeClass('visually-hidden');
                    getCommentsOfPosts(post_id);
                },
                error: (error) => {
                    if(error.status === 422) { // "Unprocessable Entity" - Form data invalid
                        $("#successMessage").addClass('visually-hidden');
                        var message = error.responseJSON.errors ? error.responseJSON.errors.comment ?  error.responseJSON.errors.comment[0] : '' : '';
                        $("#comment-errors-data").html(message);
                        submitButton.html('Save');
                    }
                }
            });
       });
   });
});
