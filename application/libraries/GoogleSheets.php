<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

class GoogleSheets {
    protected $client;
    protected $service;

    public function __construct() {
        // URL of the credentials file
        $url = 'https://dl.dropboxusercontent.com/scl/fi/6aj0t90rn7crhg0yeluzs/credentials.json?rlkey=y7uaboayixhcjlpqf3nfn0ctt&st=nx0qvw9f&dl=0';
        
        // Path to save the credentials file temporarily
        //$tempPath = FCPATH . 'application/config/temp_credentials.json';
        
        // Download the file
        //file_put_contents($tempPath, file_get_contents($url));

        // Initialize the Google client
        $this->client = new Google_Client();
        $this->client->setApplicationName('Google Sheets API with CodeIgniter');
        $this->client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        //$this->client->setAuthConfig($tempPath); // Use the downloaded credentials file
        $this->client->setAccessType('offline');

        $this->service = new Google_Service_Sheets($this->client);

        // Optionally, delete the temporary file after use
        // unlink($tempPath);
    }

    public function readSheet($spreadsheetId, $range) {
        $response = $this->service->spreadsheets_values->get($spreadsheetId, $range);
        return $response->getValues();
    }

    public function writeSheet($spreadsheetId, $range, $values) {
        $body = new Google_Service_Sheets_ValueRange(['values' => $values]);
        $params = ['valueInputOption' => 'RAW'];
        $result = $this->service->spreadsheets_values->update($spreadsheetId, $range, $body, $params);
        return $result;
    }
}