$(document).ready(function () {
    $(".countingbtn").on("click", function (e) {
        e.preventDefault();

        $.ajax({
                url:"c_php/like.php",
                method: "POST",
                data:{
                    post_id:$("#post_id").val(), 

                },
                success: function (data) {   
                    console.log("success");
            },
            dataType:"text"
        });
    });
});
