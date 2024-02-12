<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function sendSMS($recipientPhoneNumber, $smsMessage) {
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPAuth = true;
        $mail->isSMTP();
        $mail->Host = '192.168.100.11';
        $mail->Username = 'webmaster';
        $mail->Password = 'q21grT8EFT';
        $mail->Port = 1125;
        $mail->setFrom('Webmaster@cliniquebeausejour.tn', 'Borne CBS-RH');
        $mail->addAddress($recipientPhoneNumber . '@sms.ngtrend.com', 'Recipient Name');
        $mail->isHTML(false);
        $mail->Subject = '';
        $mail->Body = $smsMessage;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $rowIndex = isset($_POST['rowIndex']) ? intval($_POST['rowIndex']) : -1;

    if ($rowIndex >= 0 && $status === 'OK') {
        // Read existing data from file
        $dataFilePath = "data.txt";
        $dataLines = file($dataFilePath, FILE_IGNORE_NEW_LINES);

        // Update the status in the selected row
        if (isset($dataLines[$rowIndex])) {
            // Extract data
            $data = explode('|', $dataLines[$rowIndex]);

           // Compose SMS message based on language
           if ($data[9] === 'AR') {
            $smsMessage = "{$data[2]} جاهز ، الرجاء الاتصال بمصلحة الموارد بشرية";
        } else {
            $smsMessage = "Demande [{$data[2]}] prête , rendez-vous au service RH";
        }

            // Recipient's phone number
            $recipientPhoneNumber = $data[7]; // Replace with the recipient's actual phone number

            // Send SMS
            if (sendSMS($recipientPhoneNumber, $smsMessage)) {
                // Update the status to "OK"
                $data[8] = 'OK';

                // Save the updated data back to the file
                $dataLines[$rowIndex] = implode('|', $data);
                file_put_contents($dataFilePath, implode(PHP_EOL, $dataLines));
                header("Location: data.php");

            } else {
                // Handle SMS sending failure
                echo "Failed to send SMS.";
            }
        }
    }
}
?>
