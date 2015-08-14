<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>pagination</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<style type="text/css">
	#container{
		width: 900px;
		margin-top: 20px;
	}
	p{
		display: inline;
		margin: 0;
		color: blue;
	}
	form input{
		margin-right: 50px;
		height: 25px;
	}
	a{
		color: blue;
		padding: 3px;
	}
	ul, li{
		display: inline;
	}
	li{
		/*margin-right: 20px;*/
		color: blue;
	}
	#page-div{
		text-align: right;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	table{
	width: 100%;
	font-size: 20px;
	}
	table tr:nth-child(even) {
	    background-color: #eee;
	}
	table tr:nth-child(odd) {
	   background-color:#fff;
	}
	table th{
	    background-color: #2D87E3;
	    color: white;
		text-align: left;
	}
	.ui-datepicker{
    background-color: red;
	}
	.fake-link {
    color: blue;
    text-decoration: underline;
    cursor: pointer;
    padding: 3px;
	}
	</style>
	<script>
	$(document).ready(function(){

		$("#datepicker").datepicker({
			minDate: new Date(2010, 12,01),
			maxDate: new Date(2013, 10,25),
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
		    changeYear: true,
		    defaultDate: new Date(2010, 12,01)
		    
		});
		$("#datepicke").datepicker({
			minDate: new Date(2010, 12,01),
			maxDate: new Date(2014, 10,25),
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
		    changeYear: true,
		    defaultDate: new Date(2013, 10,25)
		});
		$("#datepicker").datepicker("setDate", new Date(2010, 12,01));
		$("#datepicke").datepicker("setDate", new Date(2013, 10,25));

		$.get('/pages/index_html', function(res){
			$('#content').html(res);
		});
		$('form').submit(function(){
			$.post('/Pages/get_date', $(this).serialize(), function(res){
				$('#content').html(res);

			});
			return false;
		});
	
		$(document).on('click','span',function(){
			var num = $(this).text();
			$('#number').attr("value",num);
		$('form').trigger('submit');
		});

		$('#datepicker').keypress(function(e) {
		    if(e.which == 13) {
        $('form').trigger('submit');
	    }
		});
		
		$(document).keypress(function(e) {
		    if(e.which == 13) {
	    	$('#number').attr("value",0);
        $('form').trigger('submit');
	    }
		});
	});
	</script>
</head>
<body>
	<div id="container">
		<div id="form-div">
			<form id="gay" action="/Pages/get_date" method="post">
				Name: <input type='text' name="name"/>
				From: <input id="datepicker" type='text' name="from_date" placeholder="2011-01-01"/>
				To: <input id="datepicke" type='text' name="to_date" placeholder="2011-12-31"/>
				<input id="number" type='hidden' name="page_number" value="0">
			</form>
		</div>
		<div id="content">

		</div>
	</div>
</body>
</html>