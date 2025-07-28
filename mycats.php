<!DOCTYPE html>
<html>

<head>


<link rel="stylesheet" type="text/css" href="./media/catstyle.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

<?php
//define('WEBSITE','https://aravindsundararajan.tech/media/images/')
//echo "trying to list the files in ~catpics/media/images/:";

//$phpFileList = glob('media/images/*');
//$numFiles = (string)count(glob('media/images/*'));
//foreach($phpFileList as $filename){
//Use the is_file function to make sure that it is not a directory.
//      if(is_file($filename)){
               //echo $filename, '<br>';
//      }
//}
//$myJSON = json_encode($phpFileList);
//echo $myJSON;
?>

<script type="text/javascript" src="../assets/js/jquery.min.js"></script>

<script type="text/javascript">
  
$(document).ready(function(){
    console.log("jQuery loaded successfully");
    $("#msg").html("<h2>jQuery Hello World</h2>");
});
  
</script>

<script type="text/javascript">		
  
 $(window).load(function(){
 	console.log("Window loaded, making AJAX request...");
 	$("#msg2").html("Loading images...");	
 		$.ajax({
			type: "GET",
			url: "./catpics.php",
			dataType: "json",
			success: function(result) {
				console.log("Received image files:", result);
				for (var i = 0; i < result.length; i++) {
					$("#msg2").append("<img class='resize' src='" + result[i] + "'>");
				}
			},
			error: function(xhr, status, error) {
				console.error("AJAX Error:", error);
				console.log("Response:", xhr.responseText);
			}
		});

	});
});
</script>



<title>this is my cat</title>

</head>

<body>

these are my cats. I hope you like them. P.S. This page uses ajax to get a JSON containing the image filepaths from php with glob() and json_encode()

<iframe width="560" height="315" src="https://www.youtube.com/embed/mygmLSp5QIY?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" class = "center" allowfullscreen></iframe>


<div id="msg">
</div>

<div id="msg2">
</div>

<br/>

<div id='fileNames'></div>


</body>
</html>
