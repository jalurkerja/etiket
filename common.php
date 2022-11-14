<?php
// session_start();
$__IP		= $_SERVER["REMOTE_ADDR"];
if ($__IP == "::1" || $__IP == "127.0.0.1" || $__IP == "localhost") {
	$apiurl = "http://localhost/chr_dashboards/api/";
} else {
	$apiurl = "https://dashboard.corphr.com/chr_dashboards/api/";
}

// $apiurl = "http://localhost/chr_dashboards/api/";
// $apiurl = "https://dashboard.corphr.com/chr_dashboards/api/";

function post_training_peserta($data)
{
	global $apiurl;
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt_array(
		$curl,
		[
			CURLOPT_URL => $apiurl . "post_training_peserta.php",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => http_build_query($data),
		]
	);
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		return json_decode($err, true);
	} else {
		return $response;
	}
}

function javascript($script)
{  ?> <script>
		<?= $script; ?>
	</script>
<?php }

function check_post($val)
{
	$pattern	= "/[`'<>$!]/";
	if (is_array($val)) {
		foreach ($val as $post_1 => $val_1) {
			if (is_array($val_1)) {
				foreach ($val_1 as $post_2 => $val_2) {
					if (is_array($val_2)) {
						foreach ($val_2 as $post_3 => $val_3) {
							if (preg_match($pattern, $val_3)) {
								$_SESSION["errormessage"] = "Mohon untuk tidak menyertakan karakter khusus pada inputan!";
							}
						}
					} else {
						if (preg_match($pattern, $val_2)) {
							$_SESSION["errormessage"] = "Mohon untuk tidak menyertakan karakter khusus pada inputan!";
						}
					}
				}
			} else {
				if (preg_match($pattern, $val_1)) {
					$_SESSION["errormessage"] = "Mohon untuk tidak menyertakan karakter khusus pada inputan!";
				}
			}
		}
	} else {
		if (preg_match($pattern, $val)) {
			$_SESSION["errormessage"] = "Mohon untuk tidak menyertakan karakter khusus pada inputan!";
		}
	}
}
?>