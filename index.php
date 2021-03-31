<?php
session_start();

?>

<!DOCTYPE HTML>
<html lang="en" style="overflow-y: hidden; /* Hide vertical scrollbar */
  overflow-x: hidden;">
<head>


<meta charset="utf-8">
<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
<title translate="no">Zero Hunger</title>
<link rel="stylesheet" type="text/css" href="css/home.css">

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script src="js/jquery-3.5.1.min.js"></script>

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

</head>
	<body>
		<div class="container">
			<div class= "header">
				<div class="logo">
					<a class="link" href="#">Logo</a>
				</div>
				<div class="links">
					<nav>
						<div class="nav-links">	
						    <div class="link"><a href="index.php">Home</a></div>
						    <div class="link"><a href="aboutUs.php">About Us</a></div>
						 </div>
					</nav>
				</div>
			</div>
		    <div id="myModal" class="modal">
		        <div class ="modal-item select-language">
		        	<h3>Select language</h3>
		        </div>

		        <form action="lang.php" style="text-align: center;">
			        <div class ="modal-item lang-english">
			        	<button type="submit" class="btn-item" name="language" value="en">
				            <img src="https://storage.googleapis.com/eco-waste-2021/Languages/fr.png">
				            <span>English</span>
			        	</button>
			       </div>
			        <div class= "modal-item lang-french">
			        	<button type="submit" class="btn-item" name="language" value="fr">
				            <img src="https://storage.googleapis.com/eco-waste-2021/Languages/us.png">
				            <span>French</span>
			        	</button>
			    	</div>
			    </form>

		    </div>
		    <div class="main-container">
		    	<div class="main-content">
		    		<div class="quote">
				    	<h1 class=""><strong>Conserving is the Key</strong></h1>
				    	<p>Cutting food waste is a delicious way of saving money, <br> helping to feed the world and protect the planet.</p>
					</div>
				    <div class="btn">
				    	<form name="frm_start" method="get" action="estimation.php">
				    		<button type="submit" class="btn-start"><a href="estimation.php" >Get Started</a></button>
				    	</form>
				    </div>
				</div>				
		    </div>   
			<div class="footer">
				<div class="footer-item">
					<span>Copyright &copy; 2021 All Rights Reserved by </span>
				</div>
			</div>
		</div>

		<?php
    	// Hide and unhide modal
		if (!isset($_SESSION['language'])) {
			echo '<script>$("#myModal").modal("show");</script>';
		} 
		// If it is set, do not show the modal
		?>
	</body>
</html>
