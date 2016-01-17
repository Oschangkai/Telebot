<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>楷翊機器人</title>
</head>
<body>
<?php
//Set
$botToken = "botToken";
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents("php://input");
$updateArray = json_decode($update, TRUE);

//Get information
$chatId = $updateArray["message"]["chat"]["id"];
$senderId = $updateArray["message"]["from"]["id"];
$senderName = $updateArray["message"]["from"]["first_name"].$updateArray["message"]["from"]["last_name"];
$text = $updateArray["message"]["text"];

//Message Arrays
$key_MorningGreeting = array("早安啊", "各位早安啊!", "又是一個美好的早晨~~", $senderName."早~~", "不要調戲我!!!!");
$MorningGreeting = $key_MorningGreeting[mt_rand(0,count($key_MorningGreeting) - 1)];

$Judge_q = array("機器人 你評評理啊", "機器人你評評理啊");
$key_Judge = array("蛤？", "甘我屁事", "你們慢慢玩吧", "我要封殺妳!", "什麼？", "我什麼也沒聽到~~~", "喔", "就是說嘛! 太過分了!", "才不想理膩勒");
$Judge = $key_Judge[mt_rand(0,count($key_Judge) - 1)];

$key_GetOut = array("才不要膩", "你誰啊 我幹嘛聽你的話?", "你不是雅琪 我才不要聽".$senderName."的話膩", "你說什麼?");
$GetOut = $key_GetOut[mt_rand(0,count($key_GetOut) - 1)];

$ComeHere_q = array("你過來", "機器人你過來", "機器人 你過來", "機器人 你給我過來", "機器人你給我過來");
$key_ComeHere = array("你不是我老婆 我幹嘛過去(斜眼", "我的鈞淳呢？", $senderName."，輪不到你來命令我");
$ComeHere = $key_ComeHere[mt_rand(0,count($key_ComeHere) - 1)];
$key_ComeHere_m = array("鈞淳最Q了", "最愛鈞淳了", "老婆 什麼事m( _ _ )m  (膝蓋軟)");
$ComeHere_m = $key_ComeHere_m[mt_rand(0,count($key_ComeHere_m) - 1)];

$Crackme_q = array("我要潑你水", "臭機器人");
$key_Crackme = array("你好壞QQ", "我要哭哭了QQQQQ", "別這樣嘛", "好說好說");
$Crackme = $key_Crackme[mt_rand(0,count($key_Crackme) - 1)];

//Reply Messages
switch ($text) { 
  case '/test':
    sendMessage($chatId, "I'm KaiYi Bot!! \n Ur ID is:".$senderId);
  break;

  case '/id':
  	sendMessage($chatId, $senderId);
	break;
	
  case '/gid':
  	sendMessage($chatId, $chatId);
	break;

  case '晚安':
  	sendMessage($chatId, $senderName."晚安");
	break;
	
  case 'yeee':
  	sendMessage($chatId, "是\"翊\" 不是yeeeeee!!!!");
	break;
	
  default:
  if (in_array($text, $Crackme_q))
  	sendMessage($chatId, $Crackme);
	if (ereg("早", $text))
		sendMessage($chatId, $MorningGreeting);
  if (ereg("給本宮退下", $text))
  {
    if ($senderName == "YachiWang")
       sendMessage($chatId, "喳");
    else
       sendMessage($chatId, $GetOut);
  }
	if (in_array($text, $ComeHere_q))
	{
		if ($senderName == "Q鈞淳")
			sendMessage($chatId, $ComeHere_m);
		else
			sendMessage($chatId, $ComeHere);
	}
	if (in_array($text, $Judge_q))
	{
		if ($senderName == "ChangKaiYi")
			sendMessage($chatId, "就是說嘛! 太過分了!");
		else
  			sendMessage($chatId, $Judge);
	}

}
//定時發文
/*
ignore_user_abort(); //關掉瀏覽器，PHP腳本也可以繼續執行. 
date_default_timezone_set("Asia/Taipei");
set_time_limit(0);
$NetCut = "" ;
if (date("H:i") == "22:53")
	sendMessage("115538277", "定時發文測試");
*/
//GetText fun
function sendmessage($chatId, $text){

  $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".urlencode($text);
  file_get_contents($url);
}
?>
<!--Upload UI-->
<div title="Form">
<form action="<?php  echo $website.'/sendPhoto' ?>" method="post" enctype="multipart/form-data">
  我要寄圖片到:
  <select name="chat_id" size="1">
    <option value="-14374429">群組中
    <option value="115538277">KaiYi
    <option value="140241617">Q淳</option>
  </select>
    
  <input name="photo" type="file" accept="image/*"/>
  <input type="submit" value="送出！" />
</form>
</div>
<!--
git add --all
git commit -m "string"
git push
-->
</body>
</html>