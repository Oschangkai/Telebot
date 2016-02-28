<?php
//Set
$botToken = "botToken";
include_once("Telebot_configWithFuncs.php");
include_once("Telebot_msgArraysWithSender.php");
initPage(groupName, groupNum, $website);

//Message Arrays
$photoYee = "AgADBQADtqcxGyaRuwTA0BFv0PVLheRWvjIABEthvDFEdmrW2FwBAAEC";

$key_GetOut = array("才不要膩", "你誰啊 我幹嘛聽你的話?", "你不是雅琪 我才不要聽".$senderName."的話膩", "你說什麼?");
$GetOut = $key_GetOut[mt_rand(0,count($key_GetOut) - 1)];

$ComeHere_q = array("你過來", "機器人你過來", "機器人 你過來", "機器人 你給我過來", "機器人你給我過來");
$key_ComeHere = array("你不是我老婆 我幹嘛過去(斜眼", "我的鈞淳呢？", $senderName."，輪不到你來命令我");
$ComeHere = $key_ComeHere[mt_rand(0,count($key_ComeHere) - 1)];
$key_ComeHere_m = array("鈞淳最Q了", "最愛鈞淳了", "老婆 什麼事m( _ _ )m  (膝蓋軟)", "Q淳4ni!", "鈞淳好Q");
$ComeHere_m = $key_ComeHere_m[mt_rand(0,count($key_ComeHere_m) - 1)];

//Reply Messages
if (preg_match("/鈞淳/", $text))
  sendMessage($chatId, $ComeHere_m);

if (preg_match("/給本宮退下/", $text)){
  if ($senderName == "YachiWang")
    sendMessage($chatId, "喳");
  else
    sendMessage($chatId, $GetOut);
}

if (in_array($text, $ComeHere_q)){
  if ($senderName == "Q鈞淳")
    sendMessage($chatId, $ComeHere_m);
  else
    sendMessage($chatId, $ComeHere);
}