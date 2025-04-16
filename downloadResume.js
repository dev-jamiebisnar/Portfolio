const express = require('express');
const path = require('path');
const fs = require('fs');

const app = express();

// Endpoint to handle resume download
app.get('/download-resume', (req, res) => {
    // Path to the resume file
    const filePath = path.join(__dirname, 'document', 'BISNAR, JAMIE D - RESUME IT.pdf');

    // Check if the file exists
    if (fs.existsSync(filePath)) {
        // Set headers and send the file for download
        res.download(filePath, 'BISNAR, JAMIE D - RESUME IT.pdf', (err) => {
            if (err) {
                console.error('Error while sending the file:', err);
                res.status(500).send('An error occurred while processing your request.');
            }
        });
    } else {
        res.status(404).send('The requested file does not exist.');
    }
});

// Start the server (for local testing)
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});

module.exports = app; // Export for Vercel
