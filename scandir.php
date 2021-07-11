<?php
    // $regPattern should be using regular expression
function rsearch($folder, $regPattern) {
    $dir = new RecursiveDirectoryIterator($folder);
    $ite = new RecursiveIteratorIterator($dir);
    $files = new RegexIterator($ite, $regPattern, RegexIterator::GET_MATCH);
    $fileList = array();
    foreach($files as $file) {
        $fileList = array_merge($fileList, $file);
    }
    return $fileList;
}

// usage: to find the test.zip file recursively
$result = rsearch("//tiws07/dwg/Customer/", '/.*\/Torque Rod Retainer-120814-1-1\.jpg/');
var_dump($result);
?>