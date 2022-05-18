<?php
    session_start();
?>

<!DOCTYPE html lang="ru">
<html>
	<head>
		<meta charset="utf-8" />
        <title>NEWS.RU</title>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="https://www.google.com/jsapi"></script>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="statistic.css">
    
	</head>
	<body> 
        <div class="header">
            <h1>NEWS.RU</h1>
            <p>Новости</p>
        </div>
        <div class="navbar">
            <a href="main_admin.php" class="active">Главная</a> 
            <a href="report.php" class="active">Статистика</a> 
            </div>
        </div>

        <div class="report">
            <h2>Статистика просмотров</h2>
            <div id="output_table"></div>
            <div id="views" style="width: 500px; height: 400px;"></div>
        </div> 

        <script>
            let output_table = $("#output_table");
            function request(){
                $.ajax({
                    url: "L3_server_statistic.php",
                }).done(res => {
                    output_table.html(res);
                });
            }		
            request();
        </script>

        <script>
            $( document ).ready(function() {
                google.load("visualization", "1", {packages:["corechart"]});
                google.setOnLoadCallback(drawChart);

                function tableToArray(table) {
                    var result = [];
                    var rows = table.rows;
                    var cells, t;

                    result.push(['Статья (идентификатор)', 'Количество просмотров']);

                    // Iterate over rows
                    for (var i=1; i<rows.length; i++) {
                        cells = rows[i].cells;
                        t = [];
                        t.push(Number(cells[0].textContent));
                        t.push(Number(cells[2].textContent));
                        result.push(t);
                    }
                    return result; 
                }

                var data_graphic = tableToArray(document.getElementById('data-table'));
            
                function drawChart() {

                    var data = google.visualization.arrayToDataTable(data_graphic);

                    var options = {
                    title: 'Диаграмма популярности новостей',
                    hAxis: {title: 'Статья (идентификатор)'},
                    vAxis: {title: 'Количество просмотров'}
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById('views'));
                    chart.draw(data, options);
                }
            });
            
        </script>

	</body>
</html>