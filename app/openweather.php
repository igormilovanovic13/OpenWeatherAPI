<?php

require_once "../vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

$client = new Client([
    'base_uri' => 'https://api.openweathermap.org/data/2.5/'
]);

$city = $_GET['city'];
$config = include '../config/services.php';
$key = $config['openweather']['key'];

try {
    $response = $client->request('GET', "weather?q={$city}&appid={$key}&units=metric&lang=sr");
} catch (ClientException $e) {
    header("Location: ../template/home.php?error=Grad za zadatim imenom nije pronadjen");
}

$body = json_decode($response->getBody(), true);

header("Location: ../template/weather_preview.php?icon={$body['weather'][0]['icon']}&name={$body['name']}&desc={$body['weather'][0]['description']}&temp={$body['main']['temp']}&feels_like={$body['main']['feels_like']}&min_temp={$body['main']['temp_min']}&max_temp={$body['main']['temp_max']}");


