<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;

class XlsxParserService
{
    public function parseXlsxFile($filePath)
    {
        $data = Excel::toArray([], $filePath)[0];
        $results = [];

        foreach ($data as $index => $row) {
            // Skip the header row
            if ($index === 0) {
                continue;
            }

            $url = $row[2] ?? null; // URL MUSTER&DIKSON column
            if ($url) {
                $title = $this->fetchTitleFromUrl($url);
                $desc = $this->fetchDescFromUrl($url);
                $results[] = [
                    'photo' => $row[0] ?? null,
                    'url_drive' => $row[1] ?? null,
                    'url_muster_dikson' => $url,
                    'title' => $title,
                    'desc' => $desc,
                ];
            }
        }

        return $results;
    }

    private function fetchTitleFromUrl($url)
    {
        dump("Product URL -> ".$url);
        try {
            // Command to execute Puppeteer script
            $command = "node fetch-title.js " . escapeshellarg($url);

            // Execute the command and capture the output
            $output = [];
            exec($command, $output);

            // Return the first line of output (the fetched title)
            return $output[0] ?? 'Title not found';
        } catch (\Exception $e) {
            return 'Error fetching title: ' . $e->getMessage();
        }
    }
  private function fetchDescFromUrl($url)
    {
        dump("Product URL -> ".$url);
        try {
            // Command to execute Puppeteer script
            $command = "node fetch-desc.js " . escapeshellarg($url);

            $output = [];
            exec($command, $output);

            // Return the first line of output (the fetched title)
            return $output[0] ?? 'Desc not found';
        } catch (\Exception $e) {
            return 'Error fetching Desc: ' . $e->getMessage();
        }
    }

}
