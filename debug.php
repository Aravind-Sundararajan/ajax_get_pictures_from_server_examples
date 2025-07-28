<?php
header('Content-Type: application/json');

// Test the glob pattern
$phpFileList = glob("./media/images/*.{jpg,jpeg,png,gif}", GLOB_BRACE); 

$cleanFileList = array();
foreach($phpFileList as $file) {
    if(is_file($file)) {
        $cleanFileList[] = $file;
    }
}

// Add debug info
$debug = array(
    'total_files_found' => count($phpFileList),
    'valid_files' => count($cleanFileList),
    'files' => $cleanFileList,
    'raw_glob_result' => $phpFileList
);

echo json_encode($debug, JSON_PRETTY_PRINT);
?> 