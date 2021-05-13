<?php
$name = $_POST['uname'];
$phone = $_POST['utel'];
if( preg_match("/[А-Яа-я]/", $name) ){
if(strlen($phone) > 12 || strpos($phone, ".") > 0 ||  strlen($name) > 12){
    $tp = 1;
}
if($tp==1){
    $tipk = 5;
}else{
if($name == '' || $phone == ''){$tipk = -1;}else{
$token = "1090934687:AAGIMBi-CJx5LLgRHD7ckPjSk3eg#########";
$chat_id = "-402128098";
$arr = array(
  'Хей, оставили новую заявку. Вот данные: ',
  'Имя - ' => $name,
  'Телефон - ' => $phone,
  'Если обработал заявку, то ответь мне на неё, а-то легко запутаться)))'
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
}
require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$url = $_SERVER['HTTP_HOST'];
$url = explode('?', $url);
$url = $url[0];
$url_link = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
$url_link = explode('?', $url_link);
$url_link = $url_link[0];

$mail->SMTPDebug = 0;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;
$mail->Username = 'yang.botov@gmail.com';
$mail->Password = '$TH34tk4i4mp3RG4g43!4g35########';
$mail->SMTPSecure = 'TLS';
$mail->Port = 587;
$mail->setFrom('yang.botov@gmail.com');
$mail->addAddress('mmasyutin@list.ru');
$mail->isHTML(true);

$mail->Subject = 'Заказ';
$mail->msgHTML("<html><body>
                <h1><center>РСО</center></h1>
                <p>Привет, <u>".$name."</u> оставил заявку.</p>
                <p>Его номер: <u>".$phone."</u></p>
                </body></html>");
$mail->AltBody = '';
	if(!$mail->send()) {
    $tipk = 0;
} else {
    $tipk = 1;
}
}
$email = "";
}
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="11;URL=index.php" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Отправка сообщения</title>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet"> 
	<link type="text/css" rel="stylesheet" href="Oops-css/style.css" />
</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1><span><?
	if($tipk == 0) {
    echo 'УСП';
} else if($tipk == 1){
    echo 'ОК';
} else if($tipk == 5){
    echo 'ОК';
}else{
    echo 'УСП';
}	
				?></span></h1>
			</div>
			<p><?
	if($tipk == 0) {
    echo 'Сообщение не было отправлено, попробуйте позже или позвоните нам.';
} else if($tipk == 1){
    echo 'Сообщение было успешно отправлено, скоро Вам ответят.';
} else if($tipk == 5){
    echo 'Сообщение было успешно отправлено, скоро Вам ответят.';
}else{
    echo 'Форма была заполнена неверно, попробуйте снова или позвоните нам.';
}	
				?></p>
			<a href="index.php">Назад</a>
		</div>
	</div>

</body>

</html>