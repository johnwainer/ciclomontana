<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	?><!DOCTYPE html>
<html lang="es">
	<?php $this->load->view('templates/head'); ?>
	<style type="text/css">
		.starter-template {
		padding: 3rem 1.5rem;
		text-align: center;
		}
	</style>
	<script>
		function get_visits_percentage(){
		    $.ajax({url: 'visit/get_count_visits_by_city', dataType: 'json'} )
		    .done(function( data ) {
		        var jsonTest = [];
		        $.each(data, function(index, row) {
		          var jsonData = {
		            y: row.total,
		            label: row.name
		          };
		          jsonTest.push(jsonData);
		        });
		        set_pie(jsonTest);
		    });
		}
		
		function get_visits_by_user(){
		    $.ajax({url: 'visit/get_visits_by_user_id/' + $('.custom-select').val(), dataType: 'json'} )
		    .done(function( data ) {
          var jsonTest = [];
          $.each(data, function(index, row) {
            var jsonData = {
              y: parseFloat(row.visit_price),
              label: row.created
            };
            jsonTest.push(jsonData);
          });
          set_bars(jsonTest, $(".custom-select option:selected").html());
		    });
		}

		function set_pie(dataPointData){
		  var options = {
		  title: {
		    text: "Visitas a clientes por ciudad"
		  },
		  subtitles: [{
		    text: "Reporte"
		  }],
		  animationEnabled: true,
		  data: [{
		    type: "pie",
		    startAngle: 40,
		    toolTipContent: "<b>{label}</b>: {y}",
		    showInLegend: "true",
		    legendText: "{label}",
		    indexLabelFontSize: 16,
		    indexLabel: "{label} - {y}",
		    dataPoints: dataPointData
		  }]
		};
		$("#chartContainer").CanvasJSChart(options);
		}
		
		function set_bars(dataPointData, titleData){
		  
		var options = {
			animationEnabled: true,
			title: {
				text: titleData
			},
			axisY: {
				title: 'Valor visita',
				suffix: "",
				includeZero: false
			},
			axisX: {
				title: "Fecha"
			},
			data: [{
				type: "column",
				yValueFormatString: "#,##0.0#"%"",
				dataPoints: dataPointData
			}]
		};
			$("#chartContainer2").CanvasJSChart(options);
		}
    
    window.onload = function () {
      $('.custom-select').change(function() {
        get_visits_by_user();
      });
		  get_visits_percentage();
		  get_visits_by_user();
		}
	</script>
	<body>
		<?php $this->load->view('templates/nav'); ?>
		<div class="container">
			<div class="starter-template">
				<div class="p-3" id="chartContainer" style="height: 300px; width: 100%;"></div>
        <hr class="p-3">
        <select class="browser-default custom-select">
        <?php if($clients): ?>
        <?php foreach($clients as $client): ?>
        <option value="<?php echo $client->id; ?>"><?php echo $client->name . ' | Cupo: ' . $client->quota . ' | Saldo cupo: ' . $client->quota_balance; ?></option>
        <tr>
          <td><?php echo $client->name; ?>
        <?php endforeach; ?>
        <?php endif; ?>
          </select>
				<div class="p-3" id="chartContainer2" style="height: 250px; width: 100%;"></div>
			</div>
		</div>
		<?php $this->load->view('templates/footer'); ?>
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
		<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	</body>
</html>