<?php

namespace Gulacsi\EcommsolversCart\Model;

class GenerateCSV
{

    /**
     * @param array $data
     * @param $file_name
     *
     * @return void
     */
    public function outputCSV(array $data, $file_name = 'cart.csv')
    {
        # output headers so that the file is downloaded
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=' . $file_name);
        # Disable caching - HTTP 1.1
        header('Cache-Control: no-cache, no-store, must-revalidate');
        # Disable caching - HTTP 1.0
        header('Pragma: no-cache');
        # Disable caching - Proxies
        header('Expires: 0');

        # Start the output
        $output = fopen("php://output", "w");

        # Then loop through the rows
        foreach ($data as $row) {
            # Add the rows to the body
            fputcsv($output, $row, ',');
        }
        # Close the stream off
        fclose($output);
    }
}
