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
});
  
</script>

<script>
        $(document).ready(function() {
            console.log("jQuery loaded");
            $("#debug-info").html("jQuery loaded successfully");
            
            // Test the AJAX call
            $.ajax({
                type: "GET",
                url: "./debug.php",
                dataType: "json",
                success: function(result) {
                    console.log("AJAX Success:", result);
                    $("#debug-info").html("AJAX Success! Found " + result.valid_files + " images");
                    
                    if (result.files && result.files.length > 0) {
                        result.files.forEach(function(file) {
                            $("#images-container").append('<img class="resize" src="' + file + '" alt="Cat">');
                        });
                    } else {
                        $("#images-container").html("No images found");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    console.log("Status:", status);
                    console.log("Response:", xhr.responseText);
                    $("#debug-info").html("AJAX Error: " + error + "<br>Status: " + status + "<br>Response: " + xhr.responseText);
                }
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
