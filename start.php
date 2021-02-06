<?php

$b = "--------------------------------------------------------------------------------------------------------------\n";

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;

$m = new PHPMailer;
$m->IsSMTP();
$m->Mailer = "smtp";

echo $b;
echo "[-] HOST : "; $host = trim(fgets(STDIN));
echo "[-] PORT : "; $port = trim(fgets(STDIN));
echo "[-] USER : "; $user = trim(fgets(STDIN));
echo "[-] PASS : "; $pswd = trim(fgets(STDIN));
echo "[-] FROM : "; $frms = trim(fgets(STDIN));
echo "[-] SEND : "; $addr = trim(fgets(STDIN));
echo $b;

$m->SMTPDebug = 1;
$m->SMTPAuth = TRUE;
$m->SMTPSecure = "tls";
$m->Port = $port;
$m->Host = $host;
$m->Username = $user;
$m->Password = $pswd;

$m->IsHTML(true);
$m->AddAddress($addr, $addr);
$m->SetFrom($frms, $frms);
$m->AddReplyTo($frms, $frms);
$m->AddCC($addr, $addr);
$m->Subject = "SMTP test from ".$host;
$content = "<b>Test message</b>";

$m->MsgHTML($content); 
if(!$m->Send()) {
  echo $b."[!] Error while sending Email.\n";
} else {
  echo $b."[+] Email sent successfully\n";
}
echo $b;

?>