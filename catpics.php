<?php
$phpFileList = glob("./media/images/*.{jpg,jpeg,png,gif}", GLOB_BRACE); 

$cleanFileList = array();
foreach($phpFileList as $file) {
    if(is_file($file)) {
        $cleanFileList[] = $file;
    }
}

echo json_encode($cleanFileList);
?>
