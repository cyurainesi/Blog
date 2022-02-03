

$(document).ready(function(){
	$("#myModal").hide();
    $("#myBtn").click(function(){
        $("#myModal").show();
    });

    $("#close").click(function () {
    	$("#myModal").hide();
    })
});
 


$(document).ready(function(){
	$("#myModal2").hide();
    $("#myBtn2").click(function(){
        $("#myModal2").show();
    });

    $("#close2").click(function () {
    	$("#myModal2").hide();
    });
});
 

  $(document).ready(function(){
    $("#myModal3").hide();

    $("#myBtn3").click(function(){
        $("#myModal3").show();
    });

     $("#close3").click(function () {
        $("#myModal3").hide();
    });
   
});



$(document).ready(function () {
    $("#followers").hide();

     $("#followerBtn").click(function(){
        $("#followers").show();
    });
     $("#closefollower").click(function () {
          $("#followers").hide();
     })

});


$(document).ready(function () {
    $("#following").hide();

     $("#followingBtn").click(function(){
        $("#following").show();
    });
     $("#closefollowing").click(function () {
          $("#following").hide();
     })

});



