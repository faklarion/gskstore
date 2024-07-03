<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

class GoogleSheets {
    protected $client;
    protected $service;

    public function __construct() {
        $this->client = new Google_Client();
        $this->client->setApplicationName('Google Sheets API with CodeIgniter');
        $this->client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $this->client->setAuthConfig(APPPATH . 'config/credentials.json'); // Ganti dengan path ke credentials.json Anda
        $this->client->setAccessType('offline');

        $this->service = new Google_Service_Sheets($this->client);
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