<?php

require __DIR__ . '/vendor/autoload.php';


if (empty($_POST['submit'])) {

    require_once 'formtemplate.php';
    die();
}


$api = new \Yandex\Geo\Api();

$query = $_POST['text'];

$api->setQuery($query);


$api
        ->setLang(\Yandex\Geo\Api::LANG_RU) // локаль ответа
        ->load();

$response = $api->getResponse();
//echo $response->getFoundCount(); // кол-во найденных адресов
//echo $response->getQuery(); // исходный запрос
//echo $response->getLatitude(); // широта для исходного запроса
//echo $response->getLongitude(); // долгота для исходного запроса
// Список найденных точек
$collection = $response->getList();

require_once 'formtemplate.php';

include 'template.php';
