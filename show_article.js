function show_article(){
    {
        var show_article = document.querySelectorAll('.show_article');
    
        for (var i = 0; i < show_article.length; i++) {
            show_article[i].addEventListener('click', function func() {
                
                var id = this.name;
    
                function request_(method, id){
                    $.ajax({
                        type: method,
                        url: "L3_server_show_article.php",
                        data: {id : id}
                    }).done(res=>{
                        location.reload();
                });
                }
                
                request_("POST", id);
                // location.reload();
            }
            )
        }
    }
    }