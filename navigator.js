(function($){

    // Создаем плагин jQuery sweetPages:
    $.fn.sweetPages = function(opts){
        
        // Если не было передано никаких опций, создаем пустой объект opts
        if(!opts) opts = {};
        
        var resultsPerPage = opts.perPage || 3;
        
        // Плагин лучше всего работает с неупорядоченным списком:
        var ul = this;
        var li = ul.find('li');
        
        li.each(function(){
            // Вычисление высоты каждого элемента li, и запоминание значения с помощью метода data:
            var el = $(this);
            el.data('height',el.outerHeight(true));
        });
        
        // Вычисление общего количества страниц:
        var pagesNumber = Math.ceil(li.length/resultsPerPage);
        
        // Если страниц меньше, чем две, то ничего не делаем:
        if(pagesNumber<2) return this;
    
        // Создаем управляющий div:
        var swControls = $('<div class="swControls">');
        
        for(var i=0;i<pagesNumber;i++)
        {
            // Разделяем части li, и заключаем их в div swPage:
            li.slice(i*resultsPerPage,(i+1)*resultsPerPage).wrapAll('<div class="swPage" />');
            
            // Добавляем ссылку на div swControls:
            swControls.append('<a href="" class="swShowPage">'+(i+1)+'</a>');
        }
    
        ul.append(swControls);

        var maxHeight = 0;
	    var totalWidth = 0;
	
	    var swPage = ul.find('.swPage');
	    swPage.each(function(){
		
            // Цикл по всем созданным страницам:
            var elem = $(this);

            var tmpHeight = 0;
            elem.find('li').each(function(){tmpHeight+=$(this).data('height');});

            if(tmpHeight>maxHeight)
                maxHeight = tmpHeight;

            totalWidth+=elem.outerWidth();
            
            elem.css('float','left').width(ul.width());
	    });
	
	    swPage.wrapAll('<div class="swSlider" />');
	
        // Установка высоты ul в значение самой высокой страницы:
        ul.height(maxHeight);
        
        var swSlider = ul.find('.swSlider');
        swSlider.append('<div class="clear" />').width(totalWidth);

        var hyperLinks = ul.find('a.swShowPage');
        
        hyperLinks.click(function(e){
            
            // Если управляющая ссылка нажата, прокручиваем div swSlider 
            // (который содержит все страницы) и отмечаем ее как активную:

            $(this).addClass('active').siblings().removeClass('active');
            
            swSlider.stop().animate({'margin-left':-(parseInt($(this).text())-1)*ul.width()},'slow');
            e.preventDefault();
	    });
	
	    // Отмечаем первую ссылку как активную при первом запуске кода:
	    hyperLinks.eq(0).addClass('active');
	
	    // Центрируем управляющий div:
	    swControls.css({
		    'left':'50%',
		    'margin-left':-swControls.width()/2
	    });
	
	    return this;
	}

})(jQuery);

function navigator(num){

    $('#output').empty();

    let output = $("#output");
    function request(){
            $.ajax({
                url: "L3_server_database.php",
            }).done(res => {
                output.html(res);
                $('#holder').sweetPages({perPage:num});

                var controls = $('.swControls').detach();
                controls.appendTo('#output');
            });
        }		
    request();
};