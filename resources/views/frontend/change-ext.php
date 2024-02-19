<?php

// Directory where files are located
$directory = './';

// Get all files in the directory
$files = scandir($directory);

// Loop through each file
foreach ($files as $file) {
    // Check if file is a regular file and ends with .blade.html
    if (is_file($directory.'/'.$file) && pathinfo($file, PATHINFO_EXTENSION) === 'html') {
        // Rename the file
        $newName = $directory.'/'.pathinfo($file, PATHINFO_FILENAME).'.blade.php';
        if (rename($directory.'/'.$file, $newName)) {
            echo "File '{$file}' renamed to '{$newName}' successfully.<br>";
        } else {
            echo "Failed to rename file '{$file}'.<br>";
        }
    }
}
