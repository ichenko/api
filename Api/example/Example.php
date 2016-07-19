<?php
namespace Api\Example;
use Api\Api;
use Api\DataProvider\DataProviderExample;
use Api\Request\AspUrl;
use Api\Response\Blank;

$api = new Api();
$api->setRequestType(new Blank())
    ->setDataProvider(new DataProviderExample())
    ->setRequestType(new AspUrl());
echo $api->outputCrypt($_REQUEST);
exit;



