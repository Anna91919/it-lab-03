var categories = document.querySelectorAll('.category a');   

for (var i = 0; i < categories.length; i++) {
    categories[i].addEventListener('click', function func() {

        var category = this.name;

        let output = $("#output");
        
        function request(method, category){
            $.ajax({
                    type: method,
                    url: "L3_server_category.php",
                    data: {category:category},
            }).done(res => {
                output.html(res);
            });
        }		

        request("POST", category);
                            
    })
}