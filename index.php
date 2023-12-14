<?php

require 'vendor/autoload.php';

require 'File.php';

$inputFolder = 'import';
$outputFolder = 'export';

$inputFiles = [];
foreach (File::FORMAT as $format) {
    $inputFiles = array_merge($inputFiles, glob("$inputFolder/*.$format"));
}

if (!file_exists($outputFolder)) {
    mkdir($outputFolder, );
}

foreach ($inputFiles as $inputFile) {
    $outputFile = $outputFolder . '/' . pathinfo($inputFile, PATHINFO_FILENAME) . '.webp';

    $imagick = new Imagick($inputFile);
    $imagick->setImageFormat('webp');
    $imagick->writeImage($outputFile);
}

foreach ($inputFiles as $file) {
    unlink($file);
}
