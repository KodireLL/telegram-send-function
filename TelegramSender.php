<?

	class TelegramSender {

		public static function sendTelegram($method, $data, $headers = []) {
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_POST => 1,
				CURLOPT_HEADER => 0,
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'https://api.telegram.org/bot' . BOT_TOKEN . '/' . $method,
				CURLOPT_POSTFIELDS => json_encode($data),
				CURLOPT_HTTPHEADER => array_merge(array('Content-Type: application/json'), $headers)
			]);

			$result = curl_exec($curl);
			curl_close($curl);

			return (json_decode($result, 1) ? json_decode($result, 1) : $result);
		}

	}

?>
