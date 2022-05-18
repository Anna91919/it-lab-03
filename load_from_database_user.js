let output = $("#output");

function request(){
        $.ajax({
            url: "L3_server_database_user.php",
        }).done(res => {
            output.html(res);
        });
    }		
request();