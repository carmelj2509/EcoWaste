<?php
session_start();

if(!isset($_SESSION["language"])){
    header('Location: index.php');
}

include 'connect.php';

$veg_name = $_GET["btn_crop"];
$veg_id = "";

$sql = "SELECT * FROM vegetables WHERE veg_name='".$veg_name."'";
// execute the defined sql statement
$result = mysqli_query($conn, $sql);

$harvest = $_GET["harvest"]/10000; # Convert to hectares first

while($row = $result->fetch_assoc()) {
	$veg_id = $row["veg_id"];
}
$harvest_forecast= shell_exec("python make_prediction.py ".$veg_name." ".$harvest); 
$harvest_forecast *= 1000; 

$display = array();

if($_GET["season"]=='summer'){

	$sql = "SELECT * FROM veg_per_month WHERE month_no NOT BETWEEN 5 AND 10 ORDER BY month_no";

	// execute the defined sql statement
	$result = mysqli_query($conn, $sql);


	while($row = $result->fetch_assoc()) {

		$month_no = $row["month_no"];

		// Expected value to be produced monthly
		$monthly = $row["summer_prod"] * $harvest_forecast;

		// Expected value to be in demand based on the amount produced monthly
		$demand = $monthly * $row["summer_demand"] / 100; 


		$fulfilledDemand = $row["fulfilled"];
		
		if($fulfilledDemand == 0){
			$display[$month_no] = round(abs($monthly));
		} else {
			$total = $fulfilledDemand + $monthly;
			if($demand < $total){
				$display[$month_no] = round(abs($monthly));
			}
		}
		
	}

} else {
	$sql = "SELECT * FROM veg_per_month WHERE month_no BETWEEN 5 AND 10 ORDER BY month_no";
}

?>


<!DOCTYPE HTML>
<html lang = "en" style="overflow-y: hidden; /* Hide vertical scrollbar */
  overflow-x: hidden;">
<head>
<meta charset = "utf-8">
<meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
<title>Zero Hunger</title>
<link rel = "stylesheet" type = "text/css" href = "css/result.css">

<script>
    function setValue(id) {
    	var chosenOption = document.getElementById("forecast");
        var selectedValue = chosenOption.options[chosenOption.selectedIndex].innerHTML;
        document.getElementById("selected_month").value = selectedValue.substr(0, selectedValue.indexOf(" ("));     
    }
</script>

</head>
	<body>
		<div class = "container">
			<div class = "header">
				<div class = "logo">
					<a class = "link" href = "home.html">Logo</a>
				</div>
				<div class = "links">
					<nav>
						<div class = "nav-links">	
						    <div class="link"><a href="index.php" style="text-decoration: none">Home</a></div>
						    <div class="link"><a href="aboutUs.php" style="text-decoration: none">About Us</a></div>
						 </div>
					</nav>
				</div>
			</div>
		    <div class = "main-container">
		    	<div class = "main-content">
		    		<div class = "estimate-form">
		    			<form method="post" action="saveToDb.php" name = "frm_save">
		    				<div class ="form-content">
			    				<div class = "row-1">
			    					<h2 class = "result">Please find the suggested months below</h2>
			    				</div>
			    				<div class = "row-2">
			    					<label class = "vegetable">Select a month</label>
			    					<select class = "selection" name="forecast" id="forecast" onchange="setValue()">
			    						<?php
			    							foreach($display as $key => $value) {

			    								$dateObj = DateTime::createFromFormat('!m', $key);
			    								  
			    								// Store the month name to variable
			    								$monthName = $dateObj->format('F');

			    								echo '<option value="'.$value.'">'.$monthName .' ('.round($value).' kg)</option>';
			    							}
			    						?>
			    					</select>
			    				</div>
			    				<input type="hidden" id="selected_month" name="selected_month"/>
			    				<input type="hidden" name="veg_id" value="<?php echo $veg_id ?>"/>
			    				<div class = "row-3">
			    					<button type = "submit" class = "btn-calculate" id="btn_continue">Continue</button>
			    				</div>
		    				</div>
				    	</form>
				    </div>
				</div>
			</div>				
	    </div>   
		<div class = "footer">
			<div class = "footer-item">
				<span>Copyright &copy; 2021 All Rights Reserved by </span>
			</div>
		</div>
	</div>
</body>

</html>
