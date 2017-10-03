<?php
$access_token = 'lbGeXycvJSSqcBOgnd+mBqDeFFLr3sX96orqAPmPi07PDjFEGo1IsnCMbbefiARV93qTHz2ZvSsETMaQ8G02BrnRKOtP5N6dRZx+/exXgLBTKRhQDh473rWf2cHFQXQeMzzyJjD2CAWfRzXkNeiYcQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
