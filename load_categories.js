let output = $("#categories_bar");
function request_(){
        $.ajax({
            url: "L3_server_load_categories.php",
        }).done(res => {
            output.html(res);
            navigator(100);
            // delete_categories();
            // filter();
        });
    }		
request_();