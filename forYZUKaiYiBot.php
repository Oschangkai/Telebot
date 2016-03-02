<?php
//Set
$botToken = "botToken";
include_once("Telebot_configWithFuncs.php");
initPage("groupID", $website);
logMsg($chatId, $msgLog);

//Message Arrays
$photoYee = "AgADBQADqqcxG2WxgQcZJUVV_h3pKo4lvjIABMzc-FHohtT1UhYBAAEC";
include_once("Telebot_msgArraysWithSender.php");
//Names
$key_Lin = array("松獅犬4ni", "獅子丸4ni", "柯基犬4ni", "肥肚肚", "松獅犬", "獅子丸", "柯基犬");
$Lin = $key_Lin[mt_rand(0,count($key_Lin) - 1)];

$key_Hung = array("元智林俊傑", "元智林俊傑4ni", "唱歌！唱歌！");
$Hung = $key_Hung[mt_rand(0,count($key_Hung) - 1)];

//Reply Messages
if (preg_match("/裕翔/", $text))
  sendMessage($chatId, $Lin);
if (preg_match("/子軒/", $text))
  sendMessage($chatId, $Hung);
if (preg_match("/(去死|有病|智障|白痴)/", $text, $dirtyWords))
  sendMessage($chatId, "你才".$dirtyWords[1]."膩!");
?>