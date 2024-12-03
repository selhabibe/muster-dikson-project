import puppeteer from 'puppeteer';

(async () => {
    const url = process.argv[2];

    if (!url) {
        console.error('Error: No URL provided!');
        process.exit(1);
    }

    try {
        // Launch the browser in headless mode (no GUI)
        const browser = await puppeteer.launch({ headless: true }); // headless: true to not open the browser window
        const page = await browser.newPage(); // Open new tab

        // Set user-agent to mimic a real browser
        await page.setUserAgent(
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        );

        // Navigate to the URL
        await page.goto(url, { waitUntil: 'networkidle2' });

        // Wait for the <h2> element to appear on the page
        await page.waitForSelector('#descrizione h2', { timeout: 20000 });

        // Extract the <h2> content
        const title = await page.$eval('#descrizione h2', element => element.textContent.trim());
        console.log(title); // Print the extracted title

        await browser.close(); // Close the browser after extracting the title
    } catch (error) {
        console.error('Error fetching title:', error.message);
        process.exit(1);
    }
})();
