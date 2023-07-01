<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="number" name="num" id="">
        <input type="text" name="text" id="">
        <input type="submit" value="Submit" name="sub">
    </form>
</body>
</html>
<?php
if (isset($_POST['sub'])) {
    $num = $_POST['num'];
    $text = $_POST['text']; 

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://d7sms.p.rapidapi.com/messages/v1/balance",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"Token: <REQUIRED>",
		"X-RapidAPI-Host: d7sms.p.rapidapi.com",
		"X-RapidAPI-Key: SIGN-UP-FOR-KEY"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
}
?>