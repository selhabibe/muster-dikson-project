import puppeteer from 'puppeteer';

(async () => {
    const url = process.argv[2];

    // Get URL from command line argument
    if (!url) {
        console.error('Error: No URL provided!');
        process.exit(1);
    }

    try {
        // Launch the browser in headless mode (no GUI)
        const browser = await puppeteer.launch({ headless: true });

        // Open new tab
        const page = await browser.newPage();

        // Set user-agent to mimic a real browser
        await page.setUserAgent(
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        );

        // Navigate to the URL
        await page.goto(url, { waitUntil: 'networkidle2' });

        // Wait for the #descrizione section to appear on the page
        await page.waitForSelector('#descrizione', { timeout: 20000 });

        // Extract all <p> tags content within #descrizione and join them
        const description = await page.evaluate(() => {
            const section = document.querySelector('#descrizione');
            const paragraphs = section.querySelectorAll('p');
            return Array.from(paragraphs)
                .map(p => p.textContent.trim()) // Get text content of each <p>
                .filter(text => text !== '') // Remove empty paragraphs
                .join(' '); // Join all paragraphs into a single block of text
        });

        // Print the description if it exists
        if (description && description.length > 0) {
            console.log(description); // Output the joined paragraphs as one block of text
        } else {
            console.error("No description found!");
        }

        await browser.close(); // Close the browser
    } catch (error) {
        console.error('Error fetching description:', error.message);
        process.exit(1);
    }
})();
