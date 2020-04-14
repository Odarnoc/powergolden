var server="";
$("#logout").click(function(){
    $.ajax({
        url: server+"webserviceapp/logout.php",
        type: "POST",
        dataType: "json",
        beforeSend: function() {
        },
        success: function(data) {
            window.location.replace("index.php");
        }
    });
});