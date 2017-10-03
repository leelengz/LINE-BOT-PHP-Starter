<?php 
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('lbGeXycvJSSqcBOgnd+mBqDeFFLr3sX96orqAPmPi07PDjFEGo1IsnCMbbefiARV93qTHz2ZvSsETMaQ8G02BrnRKOtP5N6dRZx+/exXgLBTKRhQDh473rWf2cHFQXQeMzzyJjD2CAWfRzXkNeiYcQdB04t89/1O/w1cDnyilFU=';
);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'u544926f34ed27bfc206b14249b43a23c']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage('<to>', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
