<?php
include_once "config.php";

var_dump($_POST, $_SERVER);
//exit;

require_once 'vendor/autoload.php';

if(isset($_POST))
{
    $gRecaptchaResponse=$_POST['g-recaptcha-response'];
    $remoteIp=$_SERVER['REMOTE_ADDR'];
    $recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY);

    $resp = $recaptcha
        ->setExpectedHostname('codes-example.test')
        ->verify($gRecaptchaResponse, $remoteIp);

    var_dump($resp);
    if ($resp->isSuccess()) {
        // Verified!
    } else {
        $errors = $resp->getErrorCodes();
    }

}

