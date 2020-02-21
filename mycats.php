<!DOCTYPE html>
<html>

<head>


<link rel="stylesheet" type="text/css" href="media/catstyle.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

<?php
//define('WEBSITE','https://aravindsundararajan.tech/media/images/')
//echo "trying to list the files in ~/media/images/:";

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

<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
  
$(document).ready(function(){
//$("#msg").html("<h2>jQuery Hello World</h2>");
});
  
</script>

<script type="text/javascript">		
  
 $(window).load(function(){
 	$("#msg2").html(function(){	
 		$.ajax({
			type: "GET",
			url: "catpics.php",
			dataType: "json",
			success:function(result){
			var output = "";
			for (var i in result){
				output += result[i];
				$("#msg2").append("<img class='resize' src='" + result[i] + "'>");
				//if (i+1 % 5 == 0)
				//{
				//	$("#msg2").append("<br>");
				//}
			}
			//$("#msg2").append(output);
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
