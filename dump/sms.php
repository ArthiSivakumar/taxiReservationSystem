<?php
    // Get address and message
    $addr = $_GET['addr'];
    $body = $_GET['body'];

    // Open Headwind GSM Modem Driver
    $hgsmdrv = new COM("HeadwindGSM.SMSDriver") or die("Unable to open Headwind GSM Modem Driver");

    // Connect to GSM modem
    $hgsmdrv->Connect();

    // Create message
    $sms = new COM("HeadwindGSM.SMSMessage") or die("Unable to create SMS message");

    $sms->To = $addr;
    $sms->Body = $body;

    // Send message
    $sms->Send();

    //free the objects
    $hgsmdrv = null;
    $sms = null;

    echo "Message '$body' has been sent to '$addr'";
?>