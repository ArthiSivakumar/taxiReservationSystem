<?php
 
function SendSMS ($host, $port, $username, $password, $phoneNoRecip, $msgText) {
 
/* Parameters:
   $host - IP address or host name of the NowSMS server
   $port - "Port number for the web interface" of the NowSMS Server
   $username - "SMS Users" account on the NowSMS server
   $password - Password defined for the "SMS Users" account on the NowSMS Server
   $phoneNoRecip - One or more phone numbers (comma delimited) to receive the text message
   $msgText - Text of the message
*/
 
   $fp = fsockopen($host, $port, $errno, $errstr);
   if (!$fp) {
      echo "errno: $errno \n";
      echo "errstr: $errstr\n";
      return $result;
   }
   fwrite($fp, "GET /?Phone=" . rawurlencode($phoneNoRecip) . "&Text=" .
    rawurlencode($msgText) . " HTTP/1.0\n");
   if ($username != "") {
      $auth = $username . ":" . $password;
      $auth = base64_encode($auth);
      fwrite($fp, "Authorization: Basic " . $auth . "\n");
   }
 
   fwrite($fp, "\n");
   $res = "";
   while(!feof($fp)) {
      $res .= fread($fp,1);
   }
   fclose($fp);
 
   return $res;
 
}

$x   = SendSMS("127.0.0.1", 8800, "username", "password", "+919003143654", "Test Message");
   echo $x;
 
?>





<?php 
 
include_once("ViaNettSMS.php"); 
 
// Declare variables. 
$Username = "YourUsername"; 
$Password = "YourPassword"; 
$MsgSender = "YourSender, example: a phone number like 4790000000"; 
$DestinationAddress = "Receiver - A phone number"; 
$Message = "Hello World!"; 
 
// Create ViaNettSMS object with params $Username and $Password 
$ViaNettSMS = new ViaNettSMS($Username, $Password); 
try 
{ 
    // Send SMS through the HTTP API 
    $Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message); 
    // Check result object returned and give response to end user according to success or not. 
    if ($Result->Success == true) 
        $Message = "Message successfully sent!"; 
    else 
        $Message = "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage; 
} 
catch (Exception $e) 
{ 
    //Error occured while connecting to server. 
    $Message = $e->getMessage(); 
} 
 
?>






<?php
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "ipipi.com"; // specify main and backup server
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Port =25;
$mail->Username = "YoureIPIPIUsername"; // SMTP username at ipipi
$mail->Password = "YourPassword"; // SMTP password

$mail->From = "YourUserName@ipipi.com";
$mail->FromName = "Your Name";
$mail->AddAddressTo("DestinationPhoneNumber@sms.ipipi.com", "Receiver Name");

$mail->Subject = "Compression Option goes here - find out more";
$mail->Body = "Your Message";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
echo "Message has been sent";
?> 