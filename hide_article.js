function hide_article(){
{
    var hide_article = document.querySelectorAll('.hide_article');

    for (var i = 0; i < hide_article.length; i++) {
        hide_article[i].addEventListener('click', function func() {
            
            var id = this.name;

            function request_(method, id){
                $.ajax({
                    type: method,
                    url: "L3_server_hide_article.php",
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