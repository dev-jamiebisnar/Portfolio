<?php
// Path to the resume file
$file = __DIR__ . '/document/BISNAR, JAMIE D - RESUME IT.pdf'; // Adjust path to your file

// Check if the file exists
if (file_exists($file)) {
    // Set headers to prompt a download
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf'); // Adjust MIME type if necessary
    header('Content-Disposition: attachment; filename="BISNAR, JAMIE D - RESUME IT.pdf"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Read and output the file
    readfile($file);
    exit;
} else {
    echo "The requested file does not exist.";
}
?>
