<?php

include("class.phpmailer1.php");

function sendEmailFunction($from, $fromname, $to,$subject, $body, $charset = 'utf-8') {
    $mail = new PHPMailer();
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = "mail.ariadna.us"; //"webmail.etb.net.co";//"66.132.131.192"; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = "envios@ariadna.com.co"; //"cristian.cogollo@etb.net.co";//"movistar@ariadna.co";//"envios@ariadna.com.co";
    $mail->Password = "envio9685"; //"1sysadmas0";//"1qa2ws3e";//envio9685";
    $mail->CharSet = $charset;

    $mail->From = $from;
    $mail->FromName = $fromname;

    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $mail->IsHTML(true);
//    if ($attachment != "") {
//        $mail->AddAttachment($attachment);
//    }

    $mail->AddAddress($to);
    //$mail->AddBCC('jorge.rodriguez@ariadna.com.ec');
    //$mail->AddBCC('javier.alban@ariadna.com.ec');


    if (!$mail->Send()) {
        return false;
    } else {
        return true;
    }
}

function sendEmailFunctionExonerados($from, $fromname, $to, $names, $subject, $body, $charset = 'utf-8', $attachment, $cc, $cco, $cu, $concesionario) {
    //die('antra a sendEmailExonerados');
    $mail = new PHPMailer();
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = "mail.ariadna.us"; //"webmail.etb.net.co";//"66.132.131.192"; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = "envios@ariadna.com.co"; //"cristian.cogollo@etb.net.co";//"movistar@ariadna.co";//"envios@ariadna.com.co";
    $mail->Password = "envio9685"; //"1sysadmas0";//"1qa2ws3e";//envio9685";
    $mail->CharSet = $charset;

    $mail->From = $from;
    $mail->FromName = $fromname;

    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $mail->IsHTML(true);
    if ($attachment != "") {
        $mail->AddAttachment($attachment);
    }

    for ($i = 0; $i < count($to); $i++) {
        $mail->AddAddress($to[$i], $names[$i]);
    }
    if (($concesionario == 62) || ($concesionario == 60) || ($concesionario == 7) || ($concesionario == 76) || ($concesionario == 5) || ($concesionario == 2) || ($concesionario == 6)) {
        $mail->AddAddress("rmoya@asiauto.com.ec");
    }

    $mail->AddAddress("jaguirre@aekia.com.ec");

    //$mail->AddAddress("jorge.rodriguez@ariadna.com.ec");

    if ((int) $cu == 1) {
        if ($cc) {
            for ($j = 0; $j < count($cc); $j++) {
                $mail->AddCC($cc[$j]);
            }
        }
        if ($cco) {
            for ($k = 0; $k < count($cco); $k++) {
                $mail->AddBCC($cco[$k]);
            }
        }
    }
    if ((int) $cu == 1) {
        $mail->AddBCC('contactos@kia.com.ec');
    }
    //$mail->AddBCC('pablo.leyton@ariadna.com.ec');
    //$mail->AddBCC('javier.alban@ariadna.com.ec');


    if (!$mail->Send()) {
        return false;
    } else {
        return true;
    }
}

function sendEmailFunctionEncuesta($from, $fromname, $to, $subject, $body) {
    $mail = new PHPMailer();
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = "mail.ariadna.us"; //"webmail.etb.net.co";//"66.132.131.192"; // SMTP server
    //$mail->Host = "192.168.100.104";
    $mail->SMTPAuth = true;
    $mail->Username = "envios@ariadna.com.co"; //"cristian.cogollo@etb.net.co";//"movistar@ariadna.co";//"envios@ariadna.com.co";
    $mail->Password = "envio9685"; //"1sysadmas0";//"1qa2ws3e";//envio9685";
    //$mail->CharSet = $charset;

    $mail->From = 'jorge.rodriguez@ariadna.com.ec';
    $mail->FromName = $fromname;

    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $mail->IsHTML(true);

    $mail->AddAddress($to);
    //$mail->AddBCC('jorge.rodriguez@ariadna.com.ec');


    if (!$mail->Send()) {
        return false;
    } else {
        return true;
    }
}

?>