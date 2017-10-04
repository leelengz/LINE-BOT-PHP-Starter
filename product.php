<?php
$access_token = 'lbGeXycvJSSqcBOgnd+mBqDeFFLr3sX96orqAPmPi07PDjFEGo1IsnCMbbefiARV93qTHz2ZvSsETMaQ8G02BrnRKOtP5N6dRZx+/exXgLBTKRhQDh473rWf2cHFQXQeMzzyJjD2CAWfRzXkNeiYcQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] != 'menu') {
			// Get text sent
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}

		elseif ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == 'menu') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$action1 = [
				'type' => 'message',
				'label' => 'product',
				'text' => 'All product'
			];

			$action2 = [
				'type' => 'message',
				'label' => 'message',
				'text' => 'Trending'
			];

			$action3 = [
				'type' => 'message',
				'label' => 'currency',
				'text' => 'Currency'
			];

			$column1 = [
				"thumbnailImageUrl" => "https://vue.23perspective.com/upload/showcase/banner02_lg.png",
        "title" => "SCG MENU",
        "text" => "Choose menu",
				"actions" => [$action1,$action2,$action3]

			];

			// $column2 = [
			// 	"thumbnailImageUrl" => "https://vue.23perspective.com/upload/showcase/banner02_lg.png",
      //   "title" => "this is menu",
      //   "text" => "description",
			// 	"actions" => [$action1,$action2]
			//
			// ];

			$template = [
					"type" => "carousel",
				  "columns" => [$column1]
			];
			//Build message to reply back
			$messages = [
				'type' => 'template',
				'altText' => 'MENU',
				'template' => $template
			];

			// $messages = [
			// 	'type' => 'sticker',
			// 	'packageId' => '1',
			// 	'stickerId' => '1'
			// ];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);

			curl_close($ch);

			echo $result . "\r\n";
		}

		elseif ($event['type'] == 'message' && $event['message']['type'] == 'sticker') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$action1 = [
				'type' => 'postback',
				'label' => 'Buy',
				'data' => 'product'
			];

			$action2 = [
				'type' => 'message',
				'label' => 'message',
				'text' => 'product'
			];

			$column1 = [
				"thumbnailImageUrl" => "https://vue.23perspective.com/upload/showcase/banner02_lg.png",
        "title" => "this is menu",
        "text" => "description",
				"actions" => [$action1,$action2]

			];

			$column2 = [
				"thumbnailImageUrl" => "https://vue.23perspective.com/upload/showcase/banner02_lg.png",
        "title" => "this is menu",
        "text" => "description",
				"actions" => [$action1,$action2]

			];

			$template = [
					"type" => "carousel",
				  "columns" => [$column1,$column2]
			];
			//Build message to reply back
			$messages = [
				'type' => 'template',
				'altText' => 'this is a carousel template',
				'template' => $template
			];

			// $messages = [
			// 	'type' => 'sticker',
			// 	'packageId' => '1',
			// 	'stickerId' => '1'
			// ];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);

			curl_close($ch);

			echo $result . "\r\n";
		}

		// elseif ($event['type'] == 'postback' && $event['postback']['data'] == 'product') {
		// 	// Get text sent
		// 	$text ="2528 baht"
		// 	// Get replyToken
		// 	$replyToken = $event['replyToken'];
		//
		// 	// Build message to reply back
		// 	$messages = [
		// 		'type' => 'text',
		// 		'text' => $text
		// 	];
		//
		// 	// Make a POST Request to Messaging API to reply to sender
		// 	$url = 'https://api.line.me/v2/bot/message/reply';
		// 	$data = [
		// 		'replyToken' => $replyToken,
		// 		'messages' => [$messages],
		// 	];
		// 	$post = json_encode($data);
		// 	$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		//
		// 	$ch = curl_init($url);
		// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		// 	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		// 	$result = curl_exec($ch);
		// 	curl_close($ch);
		//
		// 	echo $result . "\r\n";
		// }

	}

}


echo "OK";
