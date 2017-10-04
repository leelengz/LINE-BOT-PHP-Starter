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
		$keyword = strtolower($event['message']['text']);

		if ($event['type'] == 'message' && $event['message']['type'] != 'text') {
			// Get text sent
			// $text = $event['source']['userId'];

			$text = 'WELCOME TO SCG Trading \r\n พิมพ์ "menu" เพื่อเข้าสู่หน้าหลัก \r\n พิมพ์ "help" เพื่อขอความช่วยเหลือ หรือลองพิมพ์ข้อความใหม่อีกครั้ง';
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

		elseif ($event['type'] == 'message' && $event['message']['type'] == 'text' && $keyword == 'menu') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$action1 = [
				'type' => 'message',
				'label' => 'All product',
				'text' => 'product'
			];

			$action2 = [
				'type' => 'message',
				'label' => 'Trending',
				'text' => 'trending'
			];

			$action3 = [
				'type' => 'message',
				'label' => 'Currency',
				'text' => 'currency'
			];

			$column1 = [
				"thumbnailImageUrl" => "https://raw.githubusercontent.com/leelengz/LINE-BOT-PHP-Starter/master/menu1.jpg",
        "title" => "SCG MENU",
        "text" => "Choose menu",
				"actions" => [$action1,$action2,$action3]

			];

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

		elseif ($event['type'] == 'message' && $event['message']['type'] == 'text' && $keyword == 'product') {
			// Get text sent
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://raw.githubusercontent.com/leelengz/LINE-BOT-PHP-Starter/master/allproduct.jpg",
				'previewImageUrl' => "https://raw.githubusercontent.com/leelengz/LINE-BOT-PHP-Starter/master/allproduct.jpg"
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

		elseif ($event['type'] == 'message' && $event['message']['type'] == 'text' && $keyword == 'product 1') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$action1 = [
				'type' => 'message',
				'label' => 'Trending',
				'text' => 'Product 1 trending'
			];

			$action2 = [
				'type' => 'message',
				'label' => 'Detail',
				'text' => 'Product 1 detail'
			];

			$action3 = [
				'type' => 'uri',
				'label' => 'More',
				'uri' => 'https://www.scg-trading.com/'
			];

			$column1 = [
				"thumbnailImageUrl" => "https://raw.githubusercontent.com/leelengz/LINE-BOT-PHP-Starter/master/product1.jpg",
				"title" => "Product 1",
				"text" => "5000 Baht",
				"actions" => [$action1,$action2,$action3]

			];

			$template = [
					"type" => "carousel",
					"columns" => [$column1]
			];
			//Build message to reply back
			$messages = [
				'type' => 'template',
				'altText' => 'Product',
				'template' => $template
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

		elseif ($event['type'] == 'message' && $event['message']['type'] == 'text' && $keyword == 'product 1 trending') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];


			$action1 = [
				'type' => 'uri',
				'label' => 'Analyze',
				'uri' => 'https://www.scg-trading.com/'
			];

			$column1 = [
				"thumbnailImageUrl" => "https://raw.githubusercontent.com/leelengz/LINE-BOT-PHP-Starter/master/graph1.jpg",
				"title" => "Product 1 Trending ",
				"text" => "(1 Days)",
				"actions" => [$action1]

			];

			$column2 = [
				"thumbnailImageUrl" => "https://raw.githubusercontent.com/leelengz/LINE-BOT-PHP-Starter/master/graph2.jpg",
				"title" => "Product 1 Trending ",
				"text" => "(30 Days)",
				"actions" => [$action1]

			];

			$template = [
					"type" => "carousel",
					"columns" => [$column1,$column2]
			];
			//Build message to reply back
			$messages = [
				'type' => 'template',
				'altText' => 'Product 1 Trending',
				'template' => $template
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

		elseif ($event['type'] == 'message' && $event['message']['type'] == 'text' && $keyword == 'help') {
			// Get text sent
			// $text = $event['source']['userId'];

			$text = 'โทร 02-999-9999 เพื่อติดต่อเจ้าหน้าที่';
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

		else {
			// Get text sent
			// $text = $event['source']['userId'];

			$text = 'WELCOME TO SCG Trading \r\n พิมพ์ "menu" เพื่อเข้าสู่หน้าหลัก \r\n พิมพ์ "help" เพื่อขอความช่วยเหลือ หรือลองพิมพ์ข้อความใหม่อีกครั้ง';
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
