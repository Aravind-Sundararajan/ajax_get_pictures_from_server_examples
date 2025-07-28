<?php
// Test file to verify catpics.php functionality
echo "Testing catpics.php functionality:\n\n";

// Test the glob pattern
$phpFileList = glob("./media/images/*.{jpg,jpeg,png,gif}", GLOB_BRACE); 

echo "Files found with glob:\n";
foreach($phpFileList as $file) {
    echo "- $file\n";
}

echo "\nTotal files found: " . count($phpFileList) . "\n\n";

// Test the JSON output
$cleanFileList = array();
foreach($phpFileList as $file) {
    if(is_file($file)) {
        $cleanFileList[] = $file;
    }
}

echo "JSON output:\n";
echo json_encode($cleanFileList, JSON_PRETTY_PRINT);
?> 