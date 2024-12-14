import puppeteer from 'puppeteer';
import ExcelJS from 'exceljs';
import { faker } from '@faker-js/faker';
import path from 'path';
import fs from 'fs';


(async () => {

    let urlArray = ["https://muster-dikson.com/it/prodotto/dikson-treat-shampoo-ristrutturante-24007413",
        "https://muster-dikson.com/it/prodotto/urtinol"]

    // for (const urlKey in urlArray) {
    const url = process.argv[2];

    if (!url) {
        console.error('Error: No URL provided!');
        process.exit(1);
    }

        let browser = await puppeteer.launch({ headless: true });

        try {

            console.log('Launching browser...');
            // browser = await puppeteer.launch({ headless: false }); // Run in non-headless mode for debugging
            // const page = await browser.newPage();

            // ****************
            const baseDir = path.join('storage', 'app', 'public');
            const productsDir = path.join(baseDir, 'products');

            // Ensure the "products" directory exists
            if (!fs.existsSync(productsDir)) {
                fs.mkdirSync(productsDir, { recursive: true });
            }

            // Ensure the "exports" directory exists
            const exportDir = path.join('public', 'exports');
            fs.mkdirSync(exportDir, { recursive: true });

            // Setup Excel file path
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const exportFilePath = path.join(exportDir, `product_list_${year}_${month}.xlsx`);

            // Initialize Excel workbook
            const workbook = new ExcelJS.Workbook();
            let worksheet;

            if (fs.existsSync(exportFilePath)) {
                await workbook.xlsx.readFile(exportFilePath);
                worksheet = workbook.getWorksheet(1);
            } else {
                worksheet = workbook.addWorksheet('Sheet1');
                worksheet.addRow([
                    'shop_brand_id', 'name', 'slug', 'sku', 'barcode', 'description',
                    'qty', 'security_stock', 'featured', 'is_visible', 'old_price',
                    'price', 'cost', 'type', 'backorder', 'requires_shipping',
                    'published_at', 'seo_title', 'seo_description', 'weight_value',
                    'weight_unit', 'height_value', 'height_unit', 'width_value',
                    'width_unit', 'depth_value', 'depth_unit', 'volume_value',
                    'volume_unit', 'product_link', 'image_path'
                ]);
            }

            // const browser = await puppeteer.launch({ headless: true });

            const page = await browser.newPage();
            await page.setUserAgent(
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
            );

            // let url = urlArray[urlKey];

            await page.goto(url, { waitUntil: 'networkidle2' });
            await page.waitForSelector('#descrizione', { timeout: 20000 });

            const pageData = await page.evaluate(() => {
                const titleElement = document.querySelector('#descrizione h2');
                const title = titleElement ? titleElement.textContent.trim() : '';

                const codeElement = document.querySelector('#descrizione h3');
                const code = codeElement ? codeElement.textContent.trim() : '';

                const section = document.querySelector('#descrizione');
                const paragraphs = section.querySelectorAll('p');
                const description = Array.from(paragraphs)
                    .map(p => p.textContent.trim())
                    .filter(text => text !== '')
                    .join('');

                const imageElement = document.querySelector('#descrizione .col-md-6.text-center img');
                const imageSrc = imageElement ? imageElement.src : '';

                return { title, description, code, imageSrc };
            });

            // Create a folder for the specific product under "products"
            const productFolder = path.join(productsDir, `${pageData.title}_${pageData.code}`);
            fs.mkdirSync(productFolder, { recursive: true });

            // Download the image using Puppeteer
            let imagePath = '';
            if (pageData.imageSrc) {
                imagePath = path.join(productFolder, 'image.jpg');
                const viewSource = await page.goto(pageData.imageSrc);
                fs.writeFileSync(imagePath, await viewSource.buffer());
            }

            // Add relative path for the Excel file
            const relativeImagePath = path.relative(baseDir, imagePath);

            const dataRow = [
                2,
                pageData.title,
                faker.helpers.slugify(pageData.title.toLowerCase()),
                pageData.code,
                faker.number.int({ min: 100000000, max: 999999999 }),
                pageData.description,
                faker.number.int({ min: 1, max: 10 }),
                faker.number.int({ min: 1, max: 10 }),
                faker.datatype.boolean(),
                false,
                faker.commerce.price(),
                faker.commerce.price(),
                faker.commerce.price(),
                faker.helpers.arrayElement(['deliverable']),
                true,
                true,
                faker.date.past(),
                pageData.title,
                pageData.description.substring(0, 160),
                faker.number.float({ min: 0.1, max: 10 }),
                'kg',
                faker.number.float({ min: 1, max: 50 }),
                'cm',
                faker.number.float({ min: 1, max: 50 }),
                'cm',
                faker.number.float({ min: 1, max: 50 }),
                'cm',
                faker.number.float({ min: 0.1, max: 10 }),
                'l',
                url,
                relativeImagePath // Save relative path
            ];

            worksheet.addRow(dataRow);

            await workbook.xlsx.writeFile(exportFilePath);

            console.log('Data and image saved successfully!');
            console.log(`File updated at: ${exportFilePath}`);
            // ****************
            // console.log(url[urlKey])
            // console.log('Navigating to URL...');
            // await page.goto(url[urlKey], { waitUntil: 'domcontentloaded', timeout: 30000 });
            //
            // console.log('Waiting for selector...');
            // await page.waitForSelector('#descrizione', { timeout: 10000 });
            //
            // console.log('Scraping data...');
            // const pageData = await page.evaluate(() => {
            //     const titleElement = document.querySelector('#descrizione h2');
            //     const title = titleElement ? titleElement.textContent.trim() : '';
            //     return { title };
            // });

            console.log('Data scraped:', pageData);


        } catch (error) {
            console.error('Error occurred:', error.message);
        } finally {
            if (browser) {
                console.log('Closing browser...');
                await browser.close();

            }
        }
    // }
})();

