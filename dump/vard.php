<?php



$ozeki_user = "admin";
$ozeki_password = "abc123";
$ozeki_url = "http://127.0.0.1:9501/api?";


function httpRequest($url){
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern,$url,$args);
    $in = "";
    $fp = fsockopen("$args[1]", $args[2], $errno, $errstr, 30);
    if (!$fp) {
       return("$errstr ($errno)");
    } else {
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: Ozeki PHP client\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
           $in.=fgets($fp, 128);
        }
    }
    fclose($fp);
    return($in);
}



function ozekiSend($phone, $messagetype, $messagedata, $debug=false){
      global $ozeki_user,$ozeki_password,$ozeki_url;

      $url = 'username='.$ozeki_user;
      $url.= '&password='.$ozeki_password;
      $url.= '&action=sendmessage';
      $url.= '&messagetype='.$messagetype;
      $url.= '&recipient='.urlencode($phone);
      $url.= '&messagedata='.urlencode($messagedata);

      $urltouse =  $ozeki_url.$url;
      if ($debug) { echo "Request: <br>$urltouse<br><br>"; }

      //Open the URL to send the message
      $response = httpRequest($urltouse);
      if ($debug) {
           echo "Response: <br><pre>".
           str_replace(array("<",">"),array("&lt;","&gt;"),$response).
           "</pre><br>"; }

      return($response);
}



$phonenum = $_POST['recipient'];
$messagetype = "SMS:VCARD";
$messagedata =
"BEGIN:VCARD\r\n".
"VERSION:2.1\r\n".
"N:".$_POST['FAMILYNAME'].";".$_POST['GIVENNAME']."\r\n".
"TEL;VOICE;HOME:".$_POST['PHONEHOME']."\r\n".
"TEL;VOICE;WORK:".$_POST['PHONEWORK']."\r\n".
"TEL;CELL:".$_POST['MOBILEHOME']."\r\n".
"TEL;CELL;WORK:".$_POST['MOBILEWORK']."\r\n".
"TEL;FAX:".$_POST['FAX']."\r\n".
"EMAIL:".$_POST['EMAIL']."\r\n".
"URL:".$_POST['HPURL']."\r\n".
"BDAY:".$_POST['BYEAR'].$_POST['BMONTH'].$_POST['BDAY']."\r\n".
"NOTE:".$_POST['NOTE']."\r\n".
"END:VCARD\r\n";

$debug = true;

ozekiSend($phonenum,$messagetype,$messagedata,$debug);

?>