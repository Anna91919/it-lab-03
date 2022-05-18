var delete_category = document.querySelectorAll('.delete_category');

for (var i = 0; i < delete_category.length; i++) {
    delete_category[i].addEventListener('click', function func() {
        
        var category = this.name;

        function request_(method, category){
            $.ajax({
                type: method,
                url: "L3_server_delete_category.php",
                data: {category : category}
            });
        }
        
        request_("POST", category);
        location.reload();
    }
    )
}