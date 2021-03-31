<?php
session_start();

if(!isset($_SESSION["language"])){
    header('Location: index.php');
}

include 'connect.php';

$sql = "SELECT * FROM vegetables";
// execute the defined sql statement
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE HTML>
<html lang = "en" style="overflow-y: hidden; /* Hide vertical scrollbar */
  overflow-x: hidden;">
<head>
<meta charset = "utf-8">
<meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
<title>Zero Hunger</title>

<!-- For drop down -->
<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.js'></script>
<script type='text/javascript' src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css">
<link rel = "stylesheet" type = "text/css" href = "css/estimation.css"/>

<style type="text/css">
    /* HIDE RADIO */
    [type=radio] { 
      position: absolute;
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* IMAGE STYLES */
    [type=radio] + img {
      cursor: pointer;
    }

    [type=radio] + img{
      cursor: pointer;
    }

    /* CHECKED STYLES */
    [type=radio]:checked + img {
      outline: 2px solid blue;
    }

   .btn-start{
   	padding: 12px;
	border:none;
	width: 119px;
	text-transform: uppercase;
	border-radius: 12px;
	background: #56ab2f;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #a8e063, #56ab2f);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #a8e063, #56ab2f);
   }

   .btn-start:hover {
	box-shadow: 3px 5px 7px rgba(0,0,0,0.6);

	.img-pos {
		margin-top: -25px; 
		margin-left: 70px;
	}
}


</style>


<!-- For google translate -->
<style>

	.yiping-language-switcher/*, .goog-te-banner-frame*/ {
	    display: none;
	}

	.goog-te-banner-frame.skiptranslate {
	    display: none !important;
	} 

	body {
	    top: 0px !important; 
	}
</style>


<div id="google_translate_element" class="yiping-language-switcher">

    <?php
        if (isset($_SESSION["language"])) {
                setcookie('googtrans', '/en/'.$_SESSION["language"]);
    }
    ?>

    <script type="text/javascript">
        function initializeGoogleTranslateElement() {
            new google.translate.TranslateElement({pageLanguage: "en"}, "google_translate_element");
         }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=initializeGoogleTranslateElement"></script>
</div>

<script>

    function setSelectValue(myId){
      document.getElementById('selectedCrop').value = myId;
      document.getElementById('displayCrop').innerHTML = myId;
    }
</script>

</head>
	<body>
		<div class = "container">
			<div class = "header">
				<div class = "logo">
					<a class = "link" href = "index.html" style="text-decoration: none;">Logo</a>
				</div>
				<div class = "links">
					<nav>
						<div class = "nav-links">	
						    <div class="link"><a href="index.php">Home</a></div>
						    <div class="link"><a href="aboutUs.php">About Us</a></div>
						 </div>
					</nav>
				</div>
			</div>
		    <div class = "main-container">
		    	<div class = "main-content">
		    		<div class = "estimate-form">
		    			<form name="frm_grain" id="frm_grain" action="result.php" onsubmit="return setButtonValue();" method="get">
		    				<span id="selectedCrop"></span>
		    				<div class ="form-content">
			    				<div class = "row-1">
			    					<label class="vegetable">Vegetable</label>

			    					<div class="dropdown btn-group" style="margin-left: 5px;">

			    					    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			    					      <span id="displayCrop">Select one</span> <span class="caret"></span>
			    					    </a>

			    					    <ul class="dropdown-menu" style="overflow-y: auto;max-height: 23em;width: 43%">
			    					        <?php

			                                    while($row = $result->fetch_assoc()) {
			                                        echo '<li id="'.$row['veg_name'].'" onclick="setSelectValue(this.id)">
			                                                <a href="" onclick="return false;">
			                                                    <span>'.$row["veg_name"].'</span>
			                                                    <img class="img-pos" src="https://storage.googleapis.com/eco-waste-2021/Vegetable/'.$row['veg_id'].'.jpg" width="40%" />
			                                                </a>
			                                              </li>';
			                                    }

			    					        ?>
			    					      
			    					    </ul>
			    					    
			    					</div>
			    					<span id="errorCrop" style="color: red; display: none; font-weight: bold; margin-left: 3%;">Please select one fruit/vegetable</span>
			    				</div>
			    				<div class = "row-2" style="margin-top: 39px;">
			    					<label class = "grains"> Area to harvest (in m²)</label>
			    					<input type="Number" name="harvest" required>
			    				</div>
			    				<div class = "row-3">
			    					<div class = "season" style="margin-left: 1%;">
			    						Season
			    					</div>

			    					<div class = "item1" style="margin-left: -55%;">
			    						<label>
			    						    <input type="radio" name="season" value="summer" checked required>
			    						    
			    						    <img title="Summer" src="https://storage.googleapis.com/eco-waste-2021/Seasons/summer2.png" width="59%">
			    						
			    						</label>
		    						</div>
		    						<div class = "item1">
			    						<label>
			    						    <input type="radio" name="season" value="winter">
			    						    
			    						    <img title="Winter" src="https://storage.googleapis.com/eco-waste-2021/Seasons/winter.png" width="59%">
			    						
			    						</label>
			    					</div>
			    				</div>
			    				<div class = "row-4">
			    					<button class="btn-start" name="btn_crop" id="btn_crop">Calculate</button>
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
<?php
if(isset($_GET["vegName"])){
    echo '<script>setSelectValue("'.$_GET["vegName"].'")</script>';
}
?>

<script>
    function setButtonValue() {
      document.getElementById("btn_crop").value = document.getElementById('selectedCrop').value;
      if(document.getElementById("btn_crop").value=="undefined"){
        document.getElementById("errorCrop").style.display = "inline";
        return false;
      }
      return true;
    }
</script>
</html>
