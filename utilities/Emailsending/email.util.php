
    <?php


function send_mail($from, $to, $subject, $filename, $body){
    require 'phpmailer/PHPMailerAutoload.php';


    $mail= new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';

    $mail->Username='sevenlucky185@gmail.com';
    $mail->Password='luckyseven@07';

    $mail->setFrom($from,'Barangay Lapasan');
    $mail->addAddress($to);
    $mail->addReplyTo($from);

    $mail->isHTML(true);
    $mail->Subject=$subject;
    $mail->Body=$body;
    if($filename != 'None'){
        $mail->addAttachment('pdf/' . $filename);
    }
        
    //$mail->send();

        if (!$mail->send()){
        return false;
        }else{
        return true;
        }
    
}
?>

