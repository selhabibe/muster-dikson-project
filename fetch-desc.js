import puppeteer from 'puppeteer';
import ExcelJS from 'exceljs';
import { faker } from '@faker-js/faker';
import path from 'path';
import fs from 'fs';

(async () => {
    const url = process.argv[2];

    // Get URL from command line argument
    if (!url) {
        console.error('Error: No URL provided!');
        process.exit(1);
    }

    try {
        // Ensure the exports directory exists
        const exportDir = path.join('public', 'exports');
        fs.mkdirSync(exportDir, { recursive: true });

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

        // Extract title and description
        const pageData = await page.evaluate(() => {
            const titleElement = document.querySelector('#descrizione h2');
            const title = titleElement ? titleElement.textContent.trim() : '';

            const section = document.querySelector('#descrizione');
            const paragraphs = section.querySelectorAll('p');
            const description = Array.from(paragraphs)
                .map(p => p.textContent.trim())
                .filter(text => text !== '')
                .join('');

            console.log(description);

            return { title, description };
        });

        // Close the browser
        await browser.close();

        // Create a new workbook
        const workbook = new ExcelJS.Workbook();
        const worksheet = workbook.addWorksheet('Sheet1');

        // Define headers
        const headers = [
            'shop_brand_id', 'name', 'slug', 'sku', 'barcode', 'description',
            'qty', 'security_stock', 'featured', 'is_visible', 'old_price',
            'price', 'cost', 'type', 'backorder', 'requires_shipping',
            'published_at', 'seo_title', 'seo_description', 'weight_value',
            'weight_unit', 'height_value', 'height_unit', 'width_value',
            'width_unit', 'depth_value', 'depth_unit', 'volume_value',
            'volume_unit'
        ];

        // Add headers to the first row
        worksheet.addRow(headers);

        // Add data row
        const dataRow = [
            faker.number.int({ min: 1000, max: 9999 }), // shop_brand_id
            pageData.title, // name
            faker.helpers.slugify(pageData.title.toLowerCase()), // slug
            faker.string.uuid(), // sku
            faker.number.int({ min: 100000000, max: 999999999 }), // barcode
            pageData.description, // description
            faker.number.int({ min: 1, max: 100 }), // qty
            faker.number.int({ min: 1, max: 50 }), // security_stock
            faker.datatype.boolean(), // featured
            faker.datatype.boolean(), // is_visible
            faker.commerce.price(), // old_price
            faker.commerce.price(), // price
            faker.commerce.price(), // cost
            faker.helpers.arrayElement(['simple', 'configurable', 'bundle']), // type
            faker.datatype.boolean(), // backorder
            faker.datatype.boolean(), // requires_shipping
            faker.date.past(), // published_at
            pageData.title, // seo_title
            pageData.description.substring(0, 160), // seo_description
            faker.number.float({ min: 0.1, max: 10 }), // weight_value
            'kg', // weight_unit
            faker.number.float({ min: 1, max: 50 }), // height_value
            'cm', // height_unit
            faker.number.float({ min: 1, max: 50 }), // width_value
            'cm', // width_unit
            faker.number.float({ min: 1, max: 50 }), // depth_value
            'cm', // depth_unit
            faker.number.float({ min: 0.1, max: 10 }), // volume_value
            'l' // volume_unit
        ];

        // Add data row
        worksheet.addRow(dataRow);

        // Save the workbook to the exports directory
        const exportFilePath = path.join(exportDir, 'ps_test2.xlsx');
        await workbook.xlsx.writeFile(exportFilePath);

        // console.log('Data added to Excel file successfully!');
        // console.log(`File saved at: ${exportFilePath}`);
    } catch (error) {
        console.error('Error:', error.message);
        process.exit(1);
    }
})();
