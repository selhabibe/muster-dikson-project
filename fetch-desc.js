import puppeteer from 'puppeteer';
import ExcelJS from 'exceljs';
import { faker } from '@faker-js/faker';
import path from 'path';
import fs from 'fs';
import https from 'https';

(async () => {
    const url = process.argv[2];

    if (!url) {
        console.error('Error: No URL provided!');
        process.exit(1);
    }

    try {
        const exportDir = path.join('public', 'exports');
        fs.mkdirSync(exportDir, { recursive: true });

        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');

        const exportFilePath = path.join(exportDir, `product_list_${year}_${month}.xlsx`);

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

        const browser = await puppeteer.launch({ headless: true });
        const page = await browser.newPage();
        await page.setUserAgent(
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        );

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

        await browser.close();

        const productFolder = path.join('public', `${pageData.title}_${pageData.code}`);
        fs.mkdirSync(productFolder, { recursive: true });

        const imageFilePath = path.join(productFolder, 'image.jpg');
        if (pageData.imageSrc) {
            const file = fs.createWriteStream(imageFilePath);
            https.get(pageData.imageSrc, (response) => {
                response.pipe(file);
            });
        }

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
            imageFilePath
        ];

        worksheet.addRow(dataRow);

        await workbook.xlsx.writeFile(exportFilePath);

        console.log(`File updated at: ${exportFilePath}`);
    } catch (error) {
        console.error('Error:', error.message);
        process.exit(1);
    }
})();
