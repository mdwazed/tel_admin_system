<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Tel Dir</title>
<style type="text/css">
body {background-color:#E1FFFF;}
table{font-family:Arial, Helvetica, sans-serif; font-size:18px; border:thin solid #D7FFFF; border-collapse:collapse; width:100%;}
p {color:blue;}
tr{background-color:#FFCEFF;}
th{background-color:#FFFF79;}
tr:hover{background-color:#B9FFFF;}
td{border:thin solid #D7FFFF; text-align:center;}
label{font-size:18px; background-color:#FFFF79;}
a{background-color:#A8FFFF;}
a:hover{background-color:#CCFF00;}
#ttl h4{
	font-family:Geneva, Arial, Helvetica, sans-serif;

	font-style:normal;
	color:#0000FF;
	padding-left:30px;
	text-shadow:none;
	text-decoration:underline;
	text-align:center;
	}
</style>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="css/table.css" type="text/css"/>	
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>




</head>
<body>
<div id="ttl"><h4>Tel Dir of 11 INF Div and Bogra Area</h4></div>
<?php echo form_open('stat/tel_dir'); ?>
<label for="name">Search By Name: </label>
<input type="text" id="autocomplete1" name="name" value="">



<script>
$( "#autocomplete1" ).autocomplete({
source: [ 
			<?php
				foreach($n as $row)
				{
					echo '"'.$row->name.'",' ;
				}
			?>
		]
});
<!--</script>
<script>-->
$( "#autocomplete2" ).autocomplete({
source: [ 
			<?php
				foreach($u as $row)
				{
					echo '"'.$row->unit.'",' ;
				}
			?>
		]
});
</script>


<?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
<label for="unit">Search By Unit: </label>
<input type="text" id="autocomplete2" name="unit" value="">

	<?php
	echo form_submit('submit','Search');
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo anchor('stat/tel_dir','Show All','refresh');
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo anchor('/home','Tel Admin');
	echo form_close();
	echo '<p></p>' ;
	
		
			//$tmpl = array ( 'table_open'  => '<table  border="1" cellpadding="2" cellspacing="0" width = "100%" border-collapse= "collapse" class="hoverTable">' );

			//$this->table->set_template($tmpl);
			$this->table->set_heading('Ba No', 'Rank', 'Name','Unit','App','tel no','loc');
				foreach($dir as $row)
				{
					$this->table->add_row($row->ba_no, $row->rank, $row->name, $row->unit, $row->appt, $row->tel_no, $row->loc);
								
				}
		echo $this->table->generate();
		
		?>
</body>
</html>