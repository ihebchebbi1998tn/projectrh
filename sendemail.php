<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$piece = isset($_GET['text']) ? $_GET['text'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$matricule = isset($_GET['matricule']) ? $_GET['matricule'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : '';
$month = isset($_GET['month']) ? $_GET['month'] : '';
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';
$langue = isset($_GET['langue']) ? $_GET['langue'] : '';
$currentDate = date('Y-m-d');
$currentTime = date('H:i:s');

$counterFilePath = "counter.txt";
$counter = file_exists($counterFilePath) ? intval(file_get_contents($counterFilePath)) : 0;

if (!empty($year) && !empty($month)) {
    $dateLine = '<p style="margin: 0;"><strong>Mois demandé :</strong>' . $month . ' / ' . $year . '  </p>';
} else {
    $dateLine = '';
}

require 'vendor/autoload.php';

$subject = $piece;
$message = "";

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = '192.168.100.11';
    $mail->Username = 'webmaster';
    $mail->Password = 'q21grT8EFT';
    $mail->Port = 1125; 
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	
    $mail->setFrom('Webmaster@cliniquebeausejour.tn', 'Borne CBS-RH');
    $mail->addAddress('iheb.chebbi@cliniquebeausejour.tn', 'Borne CBS-RH');

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = '
    <!DOCTYPE html>
    <html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<title></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]--><!--[if !mso]><!-->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/><!--<![endif]-->
<style>
* {
	box-sizing: border-box;
}

body {
	margin: 0;
	padding: 0;
	background-color: #ffffff;
	-webkit-text-size-adjust: none;
	text-size-adjust: none;
}

a[x-apple-data-detectors] {
	color: inherit !important;
	text-decoration: inherit !important;
}

#MessageViewBody a {
	color: inherit;
	text-decoration: none;
}

p {
	line-height: inherit
}

.desktop_hide,
.desktop_hide table {
	mso-hide: all;
	display: none;
	max-height: 0px;
	overflow: hidden;
}

.image_block img+div {
	display: none;
}

@media (max-width: 670px) {
	.desktop_hide table.icons-inner {
		display: inline-block !important;
	}

	.icons-inner {
		text-align: center;
	}

	.icons-inner td {
		margin: 0 auto;
	}

	.mobile_hide {
		display: none;
	}

	.row-content {
		width: 100% !important;
	}

	.stack .column {
		width: 100%;
		display: block;
	}

	.mobile_hide {
		min-height: 0;
		max-height: 0;
		max-width: 0;
		overflow: hidden;
		font-size: 0px;
	}

	.desktop_hide,
	.desktop_hide table {
		display: table !important;
		max-height: none !important;
	}
}
</style>
</head>
<body style="background-color: #ffffff; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #333; width: 650px; margin: 0 auto;" width="650">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 7px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="50%">
<table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad" style="padding-left:10px;width:100%;padding-right:0px;">
<div align="left" class="alignment" style="line-height:10px">
<div style="max-width: 163px;"><img alt="Image" src="https://www.cliniquebeausejour.tn/wp-content/uploads/2022/05/clinique-beau-sejour-logo.png" style="display: block; height: auto; border: 0; width: 100%;" title="Image" width="163"/></div>
</div>
</td>
</tr>
</table>
</td>
<td class="column column-2" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-right: 15px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="50%">
<table border="0" cellpadding="0" cellspacing="0" class="empty_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad">
<div></div>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; color: #000000; width: 650px; margin: 0 auto;" width="650">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 10px; padding-left: 30px; padding-right: 30px; padding-top: 25px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td class="pad" style="padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:10px;">
<div style="color:#043676;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:20px;line-height:120%;text-align:left;mso-line-height-alt:24px;">
<p style="margin: 0; word-break: break-word;"><span><strong>Demande BornceCBS-RH</strong>( ' . $currentDate . ' / (' . $currentTime . ') </span></p>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td class="pad" style="padding-bottom:10px;padding-left:40px;padding-right:40px;padding-top:10px;">
<div style="color:#555555;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:14px;line-height:150%;text-align:center;mso-line-height-alt:21px;"> </div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td class="pad" style="padding-bottom:5px;padding-left:5px;padding-right:5px;">
<div style="color:#454562;font-family:Tahoma,Verdana,Segoe,sans-serif;font-size:20px;letter-spacing:1px;line-height:120%;text-align:left;mso-line-height-alt:24px;">
<p style="margin: 0; word-break: break-word; margin-bottom: 8px;"><strong>Objét : </strong> ' . $piece . '</p>
<p style="margin: 0; margin-bottom: 8px;"><strong>Nom et prénom :</strong> ' . $name . '</p>
<p style="margin: 0;"><strong>Matricule :</strong> ' . $matricule . '</p>
<p>' . $dateLine . ' </p>
</div>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px; margin: 0 auto;" width="650">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 15px; padding-left: 20px; padding-right: 20px; padding-top: 15px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="10" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td class="pad">
<div style="color:#6b6b6b;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:14px;line-height:120%;text-align:center;mso-line-height-alt:16.8px;">
<p style="margin: 0;">Ce mail a été envoyé automatiquement suite à une demande CBS-RH Borne .</p>
</div>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 650px; margin: 0 auto;" width="650">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="icons_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad" style="vertical-align: middle; color: #1e0e4b; font-family: sans-serif; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;">
<table cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="alignment" style="vertical-align: middle; text-align: center;"><!--[if vml]><table align="center" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
<!--[if !vml]><!-->
<table cellpadding="0" cellspacing="0" class="icons-inner" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;"><!--<![endif]-->
<tr>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table><!-- End -->
</body>
</html>';
    
// $mail->send();

$formattedDate = date('Y-m-d', strtotime($currentDate));

$servername = "192.168.100.15";
$username = "borne-user";
$password = "PT6cACXrBicY/I-n";
$dbname = "cbs-intranet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `cbs-demandes`(`date_demande`, `type_demande`, `demandee_par`, `matricule`, `annee_fiche`, `mois_fiche`, `etat_demande`, `source_demande`, `traitee_le`, `traitee_par`, `notifiee_par`) 
		VALUES ('$formattedDate', '$piece', '$name', '$matricule', '$year', '$month', 'En cours de traitement', 'Borne cbs', '-', '-', '-')";

if ($conn->query($sql) === true) {
	echo "Record inserted successfully";
} else {
	echo "Error: " . $conn->error;
}

$conn->close();

$dataString = "{$counter}|{$currentDate}|{$piece}|{$name}|{$matricule}|{$year}|{$month}|{$phone}|En cours de traitement|{$langue}";

$counter++;

file_put_contents($counterFilePath, $counter, LOCK_EX);

$filePath = "data.txt"; 
file_put_contents($filePath, $dataString . PHP_EOL, FILE_APPEND | LOCK_EX);

if ($langue === 'FR') {
	header('Location: MerciFR.html');
} else {
	header('Location: MerciAR.html');
}

} catch (Exception $e) {
echo "Failed to send email. Error: {$mail->ErrorInfo}";
}
?>