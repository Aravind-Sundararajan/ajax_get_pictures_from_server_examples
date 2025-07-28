<!DOCTYPE html>
<html>

<head>


<link rel="stylesheet" type="text/css" href="./media/catstyle.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .header {
            text-align: center;
            padding: 2rem 0;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 3rem;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 1rem;
        }

        .header p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .video-container {
            text-align: center;
            margin: 2rem 0;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }

        .video-container iframe {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            transition: transform 0.3s ease;
        }

        .video-container iframe:hover {
            transform: scale(1.02);
        }

        .images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .cat-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            position: relative;
        }

        .cat-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }

        .cat-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .cat-card:hover img {
            transform: scale(1.1);
        }

        .cat-card::before {
            content: '🐱';
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 2rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .cat-card:hover::before {
            opacity: 1;
        }

        .loading {
            text-align: center;
            padding: 3rem;
            color: white;
            font-size: 1.5rem;
        }

        .loading::after {
            content: '';
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .stats {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 1.5rem;
            margin: 2rem auto;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .stats h3 {
            color: #667eea;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .stats .count {
            font-size: 2.5rem;
            font-weight: bold;
            color: #764ba2;
        }

        .error {
            background: rgba(255, 99, 132, 0.9);
            color: white;
            padding: 1rem;
            border-radius: 10px;
            margin: 1rem;
            text-align: center;
        }

        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .bounce {
            animation: bounce 0.6s ease-in-out;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
    </style>

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
            
            // Hide loading initially
            $("#loading").hide();
            
            // Add some initial animations
            $(".header").addClass("fade-in");
            $(".video-container").addClass("fade-in");
            $(".stats").addClass("fade-in");
            
            // Show loading animation
            $("#loading").show().addClass("bounce");
            
            // Make the AJAX call
            $.ajax({
                type: "GET",
                url: "./debug.php",
                dataType: "json",
                success: function(result) {
                    console.log("AJAX Success:", result);
                    
                    // Hide loading
                    $("#loading").hide();
                    
                    // Update stats with animation
                    $("#cat-count").text(result.valid_files).addClass("bounce");
                    
                    if (result.files && result.files.length > 0) {
                        // Clear container
                        $("#images-container").empty();
                        
                        // Add each image with staggered animation
                        result.files.forEach(function(file, index) {
                            setTimeout(function() {
                                const catCard = $(`
                                    <div class="cat-card fade-in">
                                        <img src="${file}" alt="Adorable Cat" loading="lazy">
                                    </div>
                                `);
                                
                                // Add click effect
                                catCard.click(function() {
                                    $(this).addClass("bounce");
                                    setTimeout(() => $(this).removeClass("bounce"), 600);
                                });
                                
                                $("#images-container").append(catCard);
                            }, index * 100); // Stagger animation by 100ms
                        });
                        
                        // Add success message
                        setTimeout(function() {
                            $("<div class='stats fade-in' style='margin-top: 2rem;'>")
                                .html("<h3>🎉 Success!</h3><p>All cats loaded successfully!</p>")
                                .insertAfter("#stats");
                        }, result.files.length * 100 + 500);
                        
                    } else {
                        $("#images-container").html(`
                            <div class="error fade-in">
                                <h3>😿 No Cats Found</h3>
                                <p>It seems there are no cat images in the collection. Maybe they're all napping?</p>
                            </div>
                        `);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    console.log("Status:", status);
                    console.log("Response:", xhr.responseText);
                    
                    // Hide loading
                    $("#loading").hide();
                    
                    // Show error with style
                    $("#images-container").html(`
                        <div class="error fade-in">
                            <h3>😿 Oops! Something went wrong</h3>
                            <p>Error: ${error}</p>
                            <p>Status: ${status}</p>
                            <p>Response: ${xhr.responseText}</p>
                        </div>
                    `);
                }
            });
            
            // Add some interactive effects
            $(".video-container iframe").hover(
                function() { $(this).addClass("bounce"); },
                function() { $(this).removeClass("bounce"); }
            );
            
            // Add parallax effect to header
            $(window).scroll(function() {
                const scrolled = $(window).scrollTop();
                $(".header").css("transform", "translateY(" + (scrolled * 0.5) + "px)");
            });
        });
    </script>



<title>this is my cat</title>

</head>

<body>

<div class="header">
    <h1>🐱 My Amazing Cats 🐱</h1>
    <p>Welcome to my cat gallery! These are my precious feline friends. This page uses AJAX to dynamically load images from PHP with glob() and json_encode(). Enjoy the purr-fect collection!</p>
</div>

<div class="video-container">
    <h2 style="color: white; margin-bottom: 1rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Cat Video of the Day</h2>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/mygmLSp5QIY?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<div class="stats" id="stats">
    <h3>📊 Cat Statistics</h3>
    <div class="count" id="cat-count">Loading...</div>
    <p>Total cats in collection</p>
</div>

<div class="loading" id="loading">Loading your adorable cats...</div>

<div class="images-grid" id="images-container">
</div>


</body>
</html>
