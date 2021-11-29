<?php
        // Create curl resource
        $curl = curl_init();

        // Setting configurations of curl
        curl_setopt_array($curl,[
                CURLOPT_URL             => "https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml?5105e8233f9433cf70ac379d6ccc5775",
                CURLOPT_CUSTOMREQUEST   => 'GET',
                CURLOPT_RETURNTRANSFER  => true
        ]);

        // $response contains the output string
        $response = curl_exec($curl);

        // Organizing informations
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $array = json_decode($json, true);

        // Getting info from $array in a better way
        foreach($array['Cube']['Cube'] as $row){
                $i=0;
                $info[$i] = $row;
                $i++;
        }

        // Close curl resource to free up system resources
        curl_close($curl);

        // Filename definition
        $filename = 'usd_currency_rates_{date}.csv';

        // Header configurations
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=$filename");

        // File reading
        $output = fopen("php://output", "w");

        // Columns creation
        $columns = array("Currency Code","Rate");
        $header = $columns;

        // Header insertion in CSV file
        fputcsv($output, $header);

        // Content insertion in CSV file
        foreach($info[0] as $number) {
                foreach($number as $rows) {
                        fputcsv($output,$rows,";");
                }
        }
        
        // Closing reading file
        fclose($output);
?>