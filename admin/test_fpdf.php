<?php
// Adjust the path to fpdf.php if it is in a different directory
require('../fpdf/fpdf.php'); // Assuming fpdf.php is inside an 'fpdf' folder

if (class_exists('FPDF')) {
    echo "FPDF class found. Installation is likely correct.<br>";

    // Try creating a simple PDF
    try {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Hello World!');

        // Output to the browser (I for inline display or D for download)
        // Using 'S' to get the output as a string and avoid sending headers in the test script
        $pdf_output = $pdf->Output('test.pdf', 'S'); 

        if ($pdf_output) {
            echo "FPDF successfully generated a test PDF (output suppressed for this test). The library is working.";
        } else {
            echo "FPDF generated an empty or invalid output.";
        }

    } catch (Exception $e) {
        echo "An error occurred during PDF generation: " . $e->getMessage();
    }

} else {
    echo "FPDF class not found. Check your `require` path and ensure the library files are present.";
}
?>
