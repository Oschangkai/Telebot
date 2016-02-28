<?php
//Pictures
$key_moon = array("🌕🌖🌗🌘🌑🌒🌓🌔🌕", "🌑🌒🌓🌔🌕🌖🌗🌘🌑", "🌕🌖🌗🌘🌑", "🌑🌒🌓🌔🌕");
$moon = $key_moon[mt_rand(0,count($key_moon) - 1)];

$key_weather = array("☀️🌤⛅️🌥☁️🌦🌧⛈🌩⚡️", "☀️🌤⛅️🌥☁️", "☁️🌦🌧⛈🌩⚡️");
$weather = $key_weather[mt_rand(0,count($key_weather) - 1)];

$zodiac = "🐭🐮🐯🐰🐲🐍🐴🐐🐒🐓🐕🐷";
//Others
$Judge_q = array("機器人 你評評理啊", "機器人你評評理啊");
$key_Judge = array("蛤？", "甘我屁事", "你們慢慢玩吧", "我要封殺妳!", "什麼？", "我什麼也沒聽到~~~", "喔", "就是說嘛! 太過分了!", "才不想理膩勒");
$Judge = $key_Judge[mt_rand(0,count($key_Judge) - 1)];

$Crackme_q = array("我要潑你水", "臭機器人");
$key_Crackme = array("你好壞QQ", "我要哭哭了QQQQQ", "別這樣嘛", "好說好說");
$Crackme = $key_Crackme[mt_rand(0,count($key_Crackme) - 1)];

$key_MorningGreeting = array("早安啊", "各位早安啊!", "又是一個美好的早晨~~", $senderName."早~~", "不要調戲我!!!!");
$MorningGreeting = $key_MorningGreeting[mt_rand(0,count($key_MorningGreeting) - 1)];

//Sender
if (substr($text, 0, 1) == "/"){//is cmd
  $text = strtolower($text);
  switch ($text) { 
    case '/test':
      sendMessage($chatId, "I'm KaiYi Bot!!\nUr ID is:".$senderId);
      break;

    case '/id':
      sendMessage($chatId, $senderId);
      break;

    case '/gid':
      sendMessage($chatId, $chatId);
      break;
  }
}
else {//is normal words
  //Pictures
  if (preg_match("/月亮/", $text))
    sendMessage($chatId, $moon);
  if (preg_match("/天氣/", $text))
    sendMessage($chatId, $weather);
  //Bad
  if (in_array($text, $Crackme_q))
    sendMessage($chatId, $Crackme);
  if (in_array($text, $Judge_q))
  {
    if ($senderName == "ChangKaiYi")
      sendMessage($chatId, "就是說嘛! 太過分了!");
    else
      sendMessage($chatId, $Judge);
  }
  //Greetings
  if (preg_match("/早安/", $text))
    sendMessage($chatId, $MorningGreeting);
  if (preg_match("/晚安/", $text))
    sendMessage($chatId, $senderName."晚安");
  if (preg_match("/(yee+)/i", $text, $yee))
  {
    sendMessage($chatId, "是*\"翊\"*不是".$yee[1]."!!!!");
    sendPhoto($chatId, $photoYee);
  }
}
?>